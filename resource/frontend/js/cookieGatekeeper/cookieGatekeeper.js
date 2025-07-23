/**
 * Cookie Consent solution to comply with EU law
 * 
 * @title           Cookie Gatekeeper
 * @description     handle acceptance levels of cookie usage
 * @namespace       dhl.cookieGatekeeper
 * 
 * @author          Heimann, Wöltge&Friends GmbH
 * @version         2014.11

 * ---
 * Inspired by CookieCuttr script from Chris Wharton (http://cookiecuttr.com)
 */

var dhl = dhl || {};

( function( $ ) {

    dhl.cookieGatekeeper = function() {
        
        // defaults
        var defaults = {
            buttons: {
                accept: {
                    enabled: false,
                    text: 'Accept cookies'
                },
                decline: {
                    enabled: false,
                    text: 'Decline cookies'
                },
                reset: {
                    //enabled: false,
                    text: 'Reset cookie decision'
                }
            },
            consent: {
                implied: {
                    autoAcceptSeconds: 0, // automatically accept cookies after x seconds; will be ignored if set to 0
                    text: 'We use cookies on our website. Please check out our {{policyPageLink}} to read more.'
                },
                explicit: {
                    text: 'We use cookies on our website. To comply with the EU e-Privacy directive, we need to ask for your consent to set these cookies.'
                },
                model: 'implied',
                reset: {
                    text: 'We\'re sorry, some features on our website have been disabled, because you have declined the usage of cookies. To change this, please reset this decision.'
                }
            },
            cookie: {
                name: 'dhl_cookie_consent',
                domain: '',
                expiry: 365,
                states: {
                    accepted: 'accepted',
                    declined: 'declined',
                    shown: 'shown'
                }
            },
            links: {
                info: {
                    enabled: false,
                    text: 'What are cookies?',
                    url: 'http://www.allaboutcookies.org/' // link to generic cookie info page
                },
                policyPage: {
                    anchor: '', // optional anchor inside policy page
                    embedded: false,
                    enabled: true,
                    pattern: '{{policyPageLink}}',
                    text: 'Privacy policy page',
                    url: '/privacy-policy/' // link to policy page
                }
            },
            styles: {
                hook: 'body', // DOM element in which the notification should be shown
                position: 'top', // top or bottom?
                prefix: 'dhl-cgk' // CSS class prefix
            }
        },
        config, // merged config object
        html; // html output


        /**
         * check if policy page anchor is present and contains a hash: modify accordingly
         */
        function preProcessConfig() {
            if ( config.links.policyPage.anchor.length > 0 && config.links.policyPage.anchor.indexOf( '#' ) != 0 ) {
                config.links.policyPage.anchor = '#' + config.links.policyPage.anchor;
            }
        }


        /**
         * replace policy page link in message (if placeholder is present)
         */
        function postProcessConfig() {
            if ( html.links.policyPage.length > 0 && config.consent[ config.consent.model ].text.indexOf( config.links.policyPage.pattern ) != -1 ) {
                config.consent[ config.consent.model ].text = config.consent[ config.consent.model ].text.replace( config.links.policyPage.pattern, html.links.policyPage );
                config.links.policyPage.embedded = true;
            }
        }


        /**
         * build link html
         * @param {String} url - link url
         * @param {String} cssClasses - array of css classes
         * @param {String} text - link text
         * @return {String} - link html
         */
        function buildLink( url, cssClasses, text ) {
            var link = '<a href="{{url}}" class="{{css}}"{{target}}>{{text}}</a>',
                css = '',
                target = ' target="_blank"';
            
            // url replacement
            link = link.replace( '{{url}}', url );
            
            // css class(es) replacement
            if ( $.isArray( cssClasses ) ) {
                for (var i=0; i < cssClasses.length; i++ ) {
                    css += ( i != 0 ? ' ' : '' ) + config.styles.prefix + cssClasses[ i ];
                }
            } else {
                css += config.styles.prefix + cssClasses;
            }
            link = link.replace( '{{css}}', css );
            
            // text replacement
            link = link.replace( '{{text}}', text );

            // check if link starts with http and add target attribute
            link = link.replace( '{{target}}', url.indexOf( 'http' ) != -1 ? target : '' );
            
            return link;
        }


        /**
         * prepare brickets for html cookie notification putput
         * @return {Object} - html brickets
         */
        function prepareHtml() {
            return {
                buttons: {
                    // write cookie accept button
                    accept: config.buttons.accept.enabled ? buildLink( '#', [ '-button', '-accept' ], config.buttons.accept.text ) : '',
                    // write cookie decline button
                    decline: config.buttons.decline.enabled ? buildLink( '#', [ '-button', '-decline' ], config.buttons.decline.text ) : '',
                    // write cookie reset button
                    reset: buildLink( '#', [ '-button', '-reset' ], config.buttons.reset.text )
                },
                links: {
                    // create "info" link
                    info: config.links.info.enabled && config.links.info.url.length > 0 ? buildLink( config.links.info.url, '-info', config.links.info.text ) : '',
                    // create policy page link
                    policyPage: config.links.policyPage.enabled && config.links.policyPage.url.length > 0 ? buildLink( config.links.policyPage.url + config.links.policyPage.anchor, '-policy', config.links.policyPage.text ) : ''
                },
                // notification wrapper
                wrapper: {
                    buttons: '<div class="' + config.styles.prefix + '-buttons">{{content}}</div>',
                    main: '<div class="' + config.styles.prefix + '">{{content}}</div>'
                }
            };
        }


        /**
         * add html to page (top or bottom position)
         * @param {String} innerContent - text content to be inserted
         * @param {String} buttons - buttons to be inserted
         * @param {String} css - css class to outer wrapper
         */
        function addCookieContent( innerContent, buttons, css ) {
            var buttons = html.wrapper.buttons.replace( '{{content}}', buttons );
                content = html.wrapper.main.replace( '{{content}}', innerContent + buttons );

            if ( config.styles.position == 'bottom' ) {
                // prepend and set bottom body padding
                $( config.styles.hook ).append( content ).css( 'padding-bottom', $( '.' + config.styles.prefix ).outerHeight( true ) );
                // add appropriate CSS classes if needed
                $( '.' + config.styles.prefix ).addClass( config.styles.prefix + '-type-bottom' );
            } else {
                // prepend and set top body padding
                $( config.styles.hook ).prepend( content ).css( 'padding-top', $( '.' + config.styles.prefix ).outerHeight( true ) );
            }

            // add extra CSS class if present
            if ( css ) {
                $( '.' + config.styles.prefix ).addClass( css );
            }
        };

        
        /**
         * automatically accept cookie after x seconds
         * @params {Object} comp - this component
         */
        function autoAcceptCookie( comp ) {
            if ( !comp.isAccepted() && !comp.isDeclined() && config.consent.implied.autoAcceptSeconds > 0 ) {
                window.setTimeout( function() {
                    $.cookie( config.cookie.name, config.cookie.states.accepted, {
                        expires: config.cookie.expiry,
                        path: '/'
                    });
        
                    $( '.' + config.styles.prefix ).fadeOut( function () {
                        $( config.styles.hook ).animate( config.styles.position == 'bottom' ? { 'padding-bottom': 0 } : { 'padding-top': 0 } );
                    });
                }, config.consent.implied.autoAcceptSeconds * 1000);
            }
        }


        /**
         * register cookie link listeners
         * cases: accept, decline, reset
         */
        function registerEvents() {
            $( '.' + config.styles.prefix + '-accept, .' + config.styles.prefix + '-decline, .' + config.styles.prefix + '-reset' ).click( function ( e ) {
                e.preventDefault();
    
                // set or remove cookie
                var cookieValue = null; // reset case
                if ( $( this ).hasClass( config.styles.prefix + '-decline' ) ) {
                    cookieValue = config.cookie.states.declined;
                } else if ( $( this ).hasClass( config.styles.prefix + '-accept' ) ) {
                    cookieValue = config.cookie.states.accepted;
                }
    
                if ( cookieValue != null ) {
                    $.cookie( config.cookie.name, cookieValue, {
                        expires: config.cookie.expiry,
                        path: '/'
                    } );
                } else {
                    $.removeCookie( config.cookie.name, {
                        path: '/'
                    } );
                }
                 
                // hide cookie notification and reload page to activate cookies
                $( '.' + config.styles.prefix ).fadeOut( function () {
                    location.reload();
                } );
            });
        }

        
        // return public interface
        return {
            /**
             * initialize new cookieKeeper instance 
             * @param {Object} options - instance options
             */
            init: function( options ) {
                // deep merge defaults with given options
                config = $.extend( true, {}, defaults, options );
                
                // prepare html output
                preProcessConfig();
                html = prepareHtml();
                postProcessConfig();
                
                // handle cookie states and notification display
                // 1) set state to 'shown' on first display of notification message (only for session and if implied consent model is active)
                // 2) set state to 'accepted' on next page load
                if ( this.getModel() == 'implied' && this.isShown() ) {
                    // -> 2)
                    $.cookie( config.cookie.name, config.cookie.states.accepted, {
                        expires: config.cookie.expiry,
                        path: '/'
                    } );
                }

                if ( !this.isAccepted() && !this.isDeclined() ) {
                    // -> 1)
                    if ( !this.isShown() ) {
                        $.cookie( config.cookie.name, config.cookie.states.shown, {
                            path: '/'
                        } );
                    }

                    // check location of policy page link
                    var policyPageLink = config.links.policyPage.embedded ? '' :  html.links.policyPage;
                    // do we need to style policy page link as a button?
                    if ( !config.links.policyPage.embedded && !config.buttons.accept.enabled && !config.buttons.decline.enabled) {
                        //$( '.' + config.styles.prefix + '-policy' ).addClass( config.styles.prefix + '-button' );
                        policyPageLink = policyPageLink.replace( config.styles.prefix + '-policy', config.styles.prefix + '-button ' + config.styles.prefix + '-policy' );
                    } 

                    // add content and interaction
                    addCookieContent( config.consent[ config.consent.model ].text, html.buttons.decline + html.buttons.accept + policyPageLink + html.links.info );
                    registerEvents();
    
                    // automatically accept cookie?
                    autoAcceptCookie( this );

                } else if ( this.isDeclined() ) {
                    // add content and interaction
                    addCookieContent( config.consent.reset.text, html.buttons.reset, config.styles.prefix + '-type-reset' );
                    registerEvents();
                }
            },

            /**
             * get current consent model
             */
            getModel: function() {
                return config.consent.model;
            },

            /**
             * user has accepted cookies?
             */
            isAccepted: function() {
                return $.cookie( config.cookie.name ) == config.cookie.states.accepted;
            },

            /**
             * user has declined cookies?
             */
            isDeclined: function() {
                return $.cookie( config.cookie.name ) == config.cookie.states.declined;
            },

            /**
             * cookie notification has been shown at least one time to the user
             */
            isShown: function() {
                return $.cookie( config.cookie.name ) == config.cookie.states.shown;
            }
        };
    };

})(jQuery);