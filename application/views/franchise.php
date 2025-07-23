
<ol class="breadcrumb">
    <li><a href="<?php echo base_url();?>">Home</a></li> 
    <li class="active">Franchise</li>
</ol>
<style>
    
.frachise-wrapper .franchiseBanner{
    position:relative;
    background-image: linear-gradient(to bottom right, #eff6ff , #fff , #eef2ff);
    min-height: auto;
    overflow:hidden;
}
.to-indigo-800 {
    --tw-gradient-to: #3730a3 var(--tw-gradient-to-position);
}
.via-blue-700 {
    --tw-gradient-to: rgb(29 78 216 / 0) var(--tw-gradient-to-position); 
    --tw-gradient-stops: var(#2563eb), #1d4ed8 var(--tw-gradient-via-position), var(#3730a3);
}
.frachise-wrapper .innerOverlay {
    height:42rem;
}
.bg-gradient-to-r {
    /*background-image: linear-gradient(to right, #2563eb , #1d4ed8 , #3730a3);*/
    background-image: linear-gradient(to right, #FFD700, #FFCC00, #FFB700);
}
/*background-image: linear-gradient(to right, #ffcc00, #fdd844, #8f7613);*/
.overflow-hidden {
    overflow: hidden;
}

.h-96 {
    height: 24rem;
}

.relative {
    position: relative;
}
.inset-0{
    inset:0;
}
.absolute{
    position:absolute;
}
.innerOverlay {
     display:flex;
    position:relative;
    width: 100%;
    height: 100%;
    margin : 0 auto;
    align-items: center;
    padding:0 1rem;
    z-index: 10;
}
.frachise-wrapper .innerOverlay img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.2;
}
.frachise-wrapper .textContainer{
    display:flex;
    position:relative;
    width: 100%;
    height: 100%;
    margin : 0 auto;
    align-items: center;
    padding:0 1rem;
    z-index: 10;
}
.text-white {
    --tw-text-opacity: 1;
    color: rgb(255 255 255 / var(--tw-text-opacity, 1));
}
.frachise-wrapper .textInner{
    max-width: 45rem;
    z-index:11;
}
.frachise-wrapper  .textInner h1{
    line-height: 1.25;
    font-weight: 700;
    font-size: 4rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}
.frachise-wrapper  .textInner h1 span ,.frachise-wrapper  .textInnerp{
    display:block;
    font-size: 1.875rem;
    line-height: 2.25rem;
    margin-bottom:0.5rem;
}
.text-blue-200 {
    --tw-text-opacity: 1;
    color: rgb(191 219 254 / var(--tw-text-opacity, 1))!important;
}
.wrapsection{
    width:100%;
    padding: 3rem 1rem;
    margin-left: auto;
    margin-right: auto;
        background-color: hsl(214.3deg 100% 98.01% / 45%)

}
.subsection {
    margin-bottom: 4rem;
    text-align:center;
    margin-bottom: 2.5rem;
}
.headerTitle{
    --tw-text-opacity: 1;
    color: rgb(31 41 55 / var(--tw-text-opacity, 1));
    font-weight:700;
    font-size: 2.25rem;
    line-height: 2.5rem;
     margin-bottom: 1rem;
}
.p{
      --tw-text-opacity: 1;
    color: rgb(31 41 55 / var(--tw-text-opacity, 1));
    max-width: 60rem;
    font-size: 1.70rem;
    /* line-height: 1.75rem; */
    margin-left: auto;
    margin-right: auto;
}
.onboardContainer {
    display:grid;
    gap:2rem;
    grid-template-columns: repeat(4, minmax(0, 1fr));
}
.border-l-blue-500 {
    --tw-border-opacity: 1;
    border-left-color: rgb(59 130 246 / var(--tw-border-opacity, 1));
}
.transition-shadow {
    transition-property: box-shadow;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    transition-duration: .15s;
}
.shadow-lg {
    --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / .1), 0 4px 6px -4px rgb(0 0 0 / .1);
    --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.shadow-2xl {
    --tw-shadow: 0 25px 50px -12px rgb(0 0 0 / .25);
    --tw-shadow-colored: 0 25px 50px -12px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.text-blue-500 {
    --tw-text-opacity: 1;
    color: rgb(59 130 246 / var(--tw-text-opacity, 1));
}
.cardBox{
    background-color: hsl(0, 0%, 100%);
    border-left-width: 4px;
    border-width: 1px;
    border-radius: 2rem;
    color: hsl(222.2 84% 4.9%);
    border-left-width: 4px;
    border: 1px #ddd solid;
}
.border-l-blue-500 {
    --tw-border-opacity: 1;
    border-left-color: rgb(59 130 246 / var(--tw-border-opacity, 1));
}
.boxHeader{
    display:flex;
    flex-direction: column;
    padding-bottom:1rem;
    padding:1.5rem;
}
.flex{
    display:flex
}
.flex-col {
    flex-direction: column;
}
.grid {
    display:grid;
}
.gap-3{
    gap: 0.75rem;
}
.gap-8 {
    gap: 2rem;
}
.items-center {
    align-items: center;
}
.tracking-tight {
    letter-spacing: -.025em;
}
.font-semibold {
    font-weight: 600;
}
.text-xl {
    font-size: 1.75rem;
    line-height: 1.75rem;
}
.pt-0 {
    padding-top: 0;
}
.p-6 {
    padding: 1.5rem;
}
.text-gray-600 {
    --tw-text-opacity: 1;
    color: rgb(75 85 99 / var(--tw-text-opacity, 1));
}
.mb-3 {
    margin-bottom: .75rem;
}
.mb-12 {
    margin-bottom: 3rem;
}
.cardContent {
    margin:0 15px;
    text-align:left;
}
.cardContent p{
    text-align:left;
    font-size:15px;
}
.border-blue-200 {
    --tw-border-opacity: 1;
    border-color: rgb(191 219 254 / var(--tw-border-opacity, 1));
}
.badge {
    display: inline-flex;
    border-radius: 9999px;
    border-width: 1px;
    padding: 7px 15px;
    font-size: 12px;
    line-height: 1rem;
    font-weight: 600;
    background-color: rgba(191, 219, 254, 0.2);
    color: #1e40af; /* a dark blue */
    float:left;
    margin-bottom:2rem;
}
.text-green-500 {
    --tw-text-opacity: 1;
    color: rgb(34 197 94 / var(--tw-text-opacity, 1));
}
.w-8 {
    width: 3rem;
}
.h-8 {
    height: 3rem;
}
.text-sm {
    font-size: 13px;
    line-height: 2.25rem;
}
.text-orange-500 {
    --tw-text-opacity: 1;
    color: rgb(249 115 22 / var(--tw-text-opacity, 1));
}
.text-purple-500 {
    --tw-text-opacity: 1;
    color: rgb(168 85 247 / var(--tw-text-opacity, 1));
}
.mb-16 {
    margin-bottom: 4rem;
}
.mb-3 {
    margin-bottom: 1.5rem;
}
.shadow-xl {
    --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / .1), 0 8px 10px -6px rgb(0 0 0 / .1);
    --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}
.to-blue-50 {
    --tw-gradient-to: #eff6ff var(--tw-gradient-to-position);
}
.from-indigo-50 {
    --tw-gradient-from: #eef2ff var(--tw-gradient-from-position);
    --tw-gradient-to: rgb(238 242 255 / 0) var(--tw-gradient-to-position);
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
}
.bg-gradient-to-r {
    /*background-image: linear-gradient(to right, var(--tw-gradient-stops));*/
}
.bg-gradient-to-a {
  
    
     --tw-gradient-from: #eef2ff ; /* blue-500 */
    --tw-gradient-to: #eff6ff ;   /* pink-500 */
    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
    background-image: linear-gradient(to right, var(--tw-gradient-stops));
}
.text-indigo-600 {
    --tw-text-opacity: 1;
    color: rgb(79 70 229 / var(--tw-text-opacity, 1));
}
.eqMain {
    grid-template-columns: repeat(2, minmax(0, 1fr));
}
.w-4 {
    width: 2rem;
}

.h-4 {
    height: 2rem;
}
.gap-2 {
    gap: .5rem;
}
.gap-6{
    gap:1.5rem;
}
.shadow-md {
    --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / .1), 0 2px 4px -2px rgb(0 0 0 / .1);
    --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
    box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
}

.bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity, 1));
}
.eqwrapper{
    padding-bottom:25px;
}
.eqMain{
    display:grid;
    
}
.cols2 {
    border-radius:15px;
}
.justify-between {
    justify-content: space-between;
}
.text-gray-800 {
    --tw-text-opacity: 1;
    color: rgb(31 41 55 / var(--tw-text-opacity, 1));
}
.font-bold {
    font-weight: 700;
}
.font-medium {
    font-weight: 600;
}
.p-8 {
    padding: 2rem;
}
.to-emerald-50 {
    --tw-gradient-to: #ecfdf5 var(--tw-gradient-to-position);
}
.from-green-50 {
   --tw-gradient-from: #f0fdf4; /* emerald-300 */
    --tw-gradient-to: #ecfdf5;   /* emerald-50 */
    background-image: linear-gradient(to right, var(--tw-gradient-from), var(--tw-gradient-to));
}

.rounded-2xl {
    border-radius: 1rem;
}
.protentialWrap {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
.border-l-green-500 {
    --tw-border-opacity: 1;
    border-left-color: rgb(34 197 94 / var(--tw-border-opacity, 1));
}
.border-l-4 {
    border-left-width: 4px;
    border-style: ridge;
}
.border {
    border-width: 1px;
}
.rounded-lg {
    border-radius:1.5rem;
}
.text-green-700 {
    --tw-text-opacity: 1;
    color: rgb(21 128 61 / var(--tw-text-opacity, 1));
}
.font-bold {
    font-weight: 700;
}
.text-3xl {
    font-size: 2.50rem;
    line-height: 2.25rem;
}
.mb-2 {
    margin-bottom: 1.5rem;
}
.italic {
    font-style: italic;
}

.mt-6 {
    margin-top: 2.5rem;
}
.text-red-700 {
    --tw-text-opacity: 1;
    color: rgb(185 28 28 / var(--tw-text-opacity, 1));
}
.tracking-tight {
    letter-spacing: -.025em;
}
.bg-red-50 {
    --tw-bg-opacity: 1;
    background-color: rgb(254 242 242 / var(--tw-bg-opacity, 1));
}
.pt-6 {
    padding-top: 1.5rem;

}
.text-blue-700 {
    --tw-text-opacity: 1;
    color: rgb(29 78 216 / var(--tw-text-opacity, 1));
}
.bg-blue-50 {
    --tw-bg-opacity: 1;
    background-color: rgb(239 246 255 / var(--tw-bg-opacity, 1));
}
.space-y-3 > * + * {
    margin-top: 12px; /* same as space-y-3 */
  }
.stepBox{
    text-align: center;
    width: 5rem;
    height: 5rem;
    background: #ffbb00;
    border-radius: 9999px;
    display: flex;
    justify-content: center;
    margin: 0 auto;
    margin-bottom: 2rem;
    color: #ffff;
    font-weight: 700;
    font-size: 23px;
    align-items: center;
}
.callBtn{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 2erm;
    white-space: nowrap;
    font-size: 14px;
    transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
    transition-timing-function: cubic-bezier(.4,0,.2,1);
    transition-duration: .15s;
    border-radius: 1rem;
    padding: 8px 25px;
    margin: 13px;
    color: #4085dc;
    border: #fff solid;
    cursor: pointer;
    text-decoration:none;
    background:#fff;
}
.p-5{
    padding:30px;
}
.pt-2{
    padding-top:2em;
}
.pb-2{
    padding-bottom:2em;
}
.callBtn:hover{
    opacity:0.8;
    background:#ddd;
}
 @media (min-width: 768px) {
    .md\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
        .md\:grid-cols-5 {
        grid-template-columns: repeat(5, minmax(0, 1fr));
    }
}
@media (min-width: 1024px) {
    .lg\:grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
    .lg\:grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}
@media (max-width : 768px) {
    .onboardContainer {
    
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }
    .eqMain {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }
    .eqwrapper  {
      
        margin: 15px 0;
        padding: 0;
    }
    .eqwrapper .cardContent{
        padding: 0;
    }
    .protentialWrap {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }
    .text-3xl {
        font-size: 1.80rem;
        line-height: 2.25rem;
    }
}

</style>
<div class="about-section" style="margin-bottom: 0px;">

    <div class="frachise-wrapper">
        <div class="row">
                <div class="franchiseBanner">
                    <div class="innerOverlay to-indigo-800 via-blue-700 bg-gradient-to-r overflow-hidden h96 relative ">
                        
                        <div class="inset-0 absolute">
                            <img src="https://images.unsplash.com/photo-1605810230434-7631ac76ec81?auto=format&amp;fit=crop&amp;q=80" >
                        </div>
                        
                        <div class="textInner text-white">
                            <h1>Express Franchise <span class="text-white ">Your Gateway to Success</span></h1>
                            
                            <span class="text-white ">
                                Join India's fastest-growing courier and logistics franchise network. Build your business with our proven model and comprehensive support.

                            </span>
                        </div>
                    </div>
                </div>
           </div>
           <div class="row">
               <div class="container-fluid m-auto wrapsection">
                   <div class="subsection">
                        <h2 class="headerTitle">Business Model</h2>
                        <p class="p">
                            Express Franchise offers a proven courier and logistics business model with comprehensive support, exclusive territory rights, and high-income potential. Join thousands of successful franchise partners across India.
                        </p>
                   </div>
               </div>
           </div>
           
            <div class="row">
               <div class="container-fluid m-auto wrapsection">
                   <div class="subsection">
                        <h2 class="headerTitle">Onboarding Requirements</h2>
                        
                        <div class="onboardContainer">
                            
                            <div class="cardBox border-l-blue-500  shadow-lg transition-shadow">
                                <div class="boxHeader">
                                    <div class="flex items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin h-8 w-8 text-blue-500" data-lov-id="src/pages/Index.tsx:59:18" data-lov-name="MapPin" data-component-path="src/pages/Index.tsx" data-component-line="59" data-component-file="Index.tsx" data-component-name="MapPin" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-blue-500%22%7D"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path><circle cx="12" cy="10" r="3"></circle></svg><h3 data-lov-id="src/pages/Index.tsx:60:18" data-lov-name="CardTitle" data-component-path="src/pages/Index.tsx" data-component-line="60" data-component-file="Index.tsx" data-component-name="CardTitle" data-component-content="%7B%22text%22%3A%22Office%20Setup%22%2C%22className%22%3A%22text-xl%22%7D" class="font-semibold tracking-tight text-xl">Office Setup</h3>
                                    </div>
                                </div>
                                <div class="cardContent pt-0 p-6">
                                    <p class="text-gray-600 mb-3">Minimum 100 sq. ft. ground-floor office space</p>
                                    <div class="badge text-blue-500 border-blue-200">
                                        Required
                                    </div>
                                </div>
                            </div>
                            <!--bx2-->
                            <div class="cardBox border-l-blue-500  shadow-lg transition-shadow">
                                <div class="boxHeader">
                                    <div class="flex items-center gap-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-8 w-8 text-green-500" data-lov-id="src/pages/Index.tsx:73:18" data-lov-name="FileText" data-component-path="src/pages/Index.tsx" data-component-line="73" data-component-file="Index.tsx" data-component-name="FileText" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-green-500%22%7D"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                                            <h3 class="font-semibold tracking-tight text-xl">Legal Documentation</h3>
                                    </div>
                                </div>
                                <div class="cardContent pt-0 p-6">
                                    <ul class="text-gray-600 text-sm">
                                        <li>
                                            Rental agreement
                                        </li>
                                        <li>GST registration copy</li>
                                        <li>Aadhar and PAN card</li>
                                        <li>Firm registration certificate</li>
                                        <li>Cancelled cheque</li>
                                    </ul>
                                </div>
                            </div>
                            <!--box3-->
                            <div class="cardBox border-l-blue-500  shadow-lg transition-shadow">
                                <div class="boxHeader">
                                    <div class="flex items-center gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-camera h-8 w-8 text-purple-500" data-lov-id="src/pages/Index.tsx:92:18" data-lov-name="Camera" data-component-path="src/pages/Index.tsx" data-component-line="92" data-component-file="Index.tsx" data-component-name="Camera" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-purple-500%22%7D"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"></path><circle cx="12" cy="13" r="3"></circle></svg>
                                        <h3  class="font-semibold tracking-tight text-xl">Office Setup</h3>
                                    </div>
                                </div>
                                <div class="cardContent pt-0 p-6">
                                    <ul class="text-gray-600 text-sm">
                                       <li>Office interior photographs</li>
                                       <li>Google location screenshot</li>
                                   </u>
                                </div>
                            </div>
                            <!--box4-->
                            <div class="cardBox border-l-blue-500  shadow-lg transition-shadow">
                                <div class="boxHeader">
                                    <div class="flex items-center gap-3">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-dollar-sign h-8 w-8 text-orange-500" data-lov-id="src/pages/Index.tsx:108:18" data-lov-name="DollarSign" data-component-path="src/pages/Index.tsx" data-component-line="108" data-component-file="Index.tsx" data-component-name="DollarSign" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-orange-500%22%7D"><line x1="12" x2="12" y1="2" y2="22"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                        <h3 class="font-semibold tracking-tight text-xl">Office Setup</h3>
                                    </div>
                                </div>
                                <div class="cardContent pt-0 p-6">
                                    <ul class="text-gray-600 text-sm">
                                        <li>₹5,000 cash deposit</li>
                                        <li>₹2,00,000 cash deposit</li>
                                    </ul>
                                </div>
                            </div>
                            
                        </div>
                   </div>
               </div>
           </div>
           <div class="row mb-16">
               <div class="eqwrapper container-fluid rounded-lg border bg-card text-card-foreground bg-gradient-to-a from-indigo-50 to-blue-50 border-none shadow-xl">
                   <div class="eqHeadWrap flex p-6">
                       <div class="eqHead flex align-items-center gap-3">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-monitor h-8 w-8 text-indigo-600" data-lov-id="src/pages/Index.tsx:127:16" data-lov-name="Monitor" data-component-path="src/pages/Index.tsx" data-component-line="127" data-component-file="Index.tsx" data-component-name="Monitor" data-component-content="%7B%22className%22%3A%22h-8%20w-8%20text-indigo-600%22%7D"><rect width="20" height="14" x="2" y="3" rx="2"></rect><line x1="8" x2="16" y1="21" y2="21"></line><line x1="12" x2="12" y1="17" y2="21"></line></svg>
                           <h3  class="font-semibold tracking-tight text-2xl text-gray-800">Equipment &amp; Infrastructure (Super Franchise Level)</h3>
                           
                       </div>
                   </div>
                    <div class="cardContent pt-0 p-6">
                        <div class="flex grid eqMain">
                            <div>
                                <h5 class="font-semibold text-gray-800 mb-3">Required Equipment:</h3>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-4 w-4 text-green-500" data-lov-id="src/pages/Index.tsx:137:22" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="137" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-4%20w-4%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                        2 branding light boards
                                    </li>
                                    
                                    <li class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-4 w-4 text-green-500" data-lov-id="src/pages/Index.tsx:137:22" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="137" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-4%20w-4%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                        Computer (4GB+ RAM, Windows 10)
                                    </li>
                                    
                                    <li class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-4 w-4 text-green-500" data-lov-id="src/pages/Index.tsx:137:22" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="137" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-4%20w-4%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                        1 counter + 1 operations table
                                    </li>
                                    
                                    <li class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-4 w-4 text-green-500" data-lov-id="src/pages/Index.tsx:137:22" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="137" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-4%20w-4%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                        2 regular chairs + 2 pillar chairs

                                    </li>
                                    
                                </ul>
                            </div>
                            
                            <div class="bg-white p-6 rounded-lg shadow-md cols2">
                                <h4 class="font-semibold text-gray-800 mb-3">Investment Breakdown:</h4>
                                
                                <div class="space-y-3">
                                    <div class="flex justify-between mb-3"> 
                                        <span class="">Franchise Fee</span>
                                        <span class="">₹2,00,000 (One-Time)</span>
                                    </div>
                                    
                                     <div class="flex justify-between mb-3"> 
                                        <span class="">Office Setup</span>
                                        <span class="">As per location</span>
                                    </div>
                                    
                                    <div class="flex justify-between mb-3"> 
                                        <span class="">Equipment & Branding</span>
                                        <span class="">Based on setup size</span>
                                    </div>
                                    
                                    <div class="flex justify-between mb-3"> 
                                        <span class="">Working Capital (3 months)</span>
                                        <span class="">Variable</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
               </div>
           </div>
           
           <div class="row mb-16">
               <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Profit Potential</h2>
               
               <div class="bg-gradient-to-a  from-green-50 to-emerald-50 p-6 rounded-2xl shadow-xl" style="padding-top: 30px;padding-bottom: 30px;margin-top: 2em;">
                   <div class="protentialWrap flex  grid gap-6">
                       
                       <div class="rounded-lg border text-card-foreground bg-white shadow-lg border-l-4 border-l-green-500">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight text-green-700">Tier 1 Cities</h3>
                            </div>
                            <div class="pt-0 p-8">
                                <div class="text-3xl font-bold text-green-500 mb-2">
                                    ₹2,50,000 – ₹3,00,000+
                                </div>
                                <div class="text-sm text-gray-600"><b>Monthly Earning Range</b></div>
                            </div>
                       </div>
                       
                       <!--box2-->
                        <div class="rounded-lg border text-card-foreground bg-white shadow-lg border-l-4 border-l-green-500">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight text-purple-500">Tier 2 Cities</h3>
                            </div>
                            <div class="pt-0 p-6">
                                <div class="text-3xl font-bold text-purple-500 mb-2">
                                    ₹1,50,000 – ₹2,50,000
                                </div>
                                <div class="text-sm text-gray-600"><b>Monthly Earning Range</b></div>
                            </div>
                       </div>
                       
                       <!--box3-->
                        <div class="rounded-lg border text-card-foreground bg-white shadow-lg border-l-4 border-l-green-500">
                            <div class="flex flex-col space-y-1.5 p-6">
                                <h3 class="text-2xl font-semibold leading-none tracking-tight text-orange-500">Tier 3 Cities</h3>
                            </div>
                            <div class="pt-0 p-6">
                                <div class="text-3xl font-bold text-orange-500 mb-2">
                                    ₹80,000 – ₹1,50,000
                                </div>
                                <div class="text-sm text-gray-600"><b>Monthly Earning Range</b></div>
                            </div>
                       </div>
                       
                   </div>
                   
                   <p class="text-center text-gray-600 mt-6 italic">* Actual income depends on local demand and delivery volume.</p>
               </div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-8 mb-16">
                
                <div class="rounded-lg border bg-card text-card-foreground shadow-xl" style="overflow:hidden">
                    <div class="flex flex-col space-y-1.5 p-8 bg-red-50">
                        <h3 class="font-semibold tracking-tight text-2xl text-red-700"> 🔷 Responsibilities</h3>
                    </div>
                    <div class="p-8 pt-6">
                        <div class="space-y-3">
                            
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700">Daily operations & store management</span>
                            </div>
                            
                              <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700">Pickup & last-mile delivery coordination</span>
                            </div>
                            
                            
                              <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700">Branding compliance & customer service</span>
                            </div>
                            
                            
                             <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700">Real-time coordination with central hub</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                 <div class="rounded-lg border bg-card text-card-foreground shadow-xl" style="overflow:hidden">
                    <div class="flex flex-col space-y-1.5 p-8 bg-blue-50">
                        <h3 class="font-semibold tracking-tight text-2xl text-blue-700">🔷 Express Group Support </h3>
                    </div>
                    <div class="p-8 pt-6">
                        <div class="space-y-3">
                            
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700">Training (logistics, billing, software) </span>
                            </div>
                            
                              <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700">  Store branding support</span>
                            </div>
                            
                            
                              <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700"> Technology (CRM, billing, tracking tools)</span>
                            </div>
                            
                            
                             <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700"> Marketing help (online + local)</span>
                            </div>
                            
                             <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-5 w-5 text-green-500 flex-shrink-0" data-lov-id="src/pages/Index.tsx:237:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="237" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-5%20w-5%20text-green-500%20flex-shrink-0%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                <span class="text-gray-700"> Dedicated backend logistics support</span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="w-100">
                <div class="mb-16">
                    <h2 class="text-4xl font-bold text-center text-gray-800 mb-12"> 🔷 Why Choose Express?</h2>
                    
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <div class="rounded-lg border bg-card text-card-foreground bg-gradient-to-a from-blue-50 to-indigo-50 border-blue-200 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="p-8">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-6 w-6 text-green-500" data-lov-id="src/pages/Index.tsx:283:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="283" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-6%20w-6%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span class="text-gray-800 font-medium"> Trusted International courier brand </span>
                                </div>
                            </div>
                        </div>
                        
                        <!--2-->
                         <div class="rounded-lg border bg-card text-card-foreground bg-gradient-to-a from-blue-50 to-indigo-50 border-blue-200 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="p-8">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-6 w-6 text-green-500" data-lov-id="src/pages/Index.tsx:283:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="283" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-6%20w-6%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span class="text-gray-800 font-medium"> High-income potential</span>
                                </div>
                            </div>
                        </div>
                        <!--3-->
                         <div class="rounded-lg border bg-card text-card-foreground bg-gradient-to-a from-blue-50 to-indigo-50 border-blue-200 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="p-8">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-6 w-6 text-green-500" data-lov-id="src/pages/Index.tsx:283:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="283" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-6%20w-6%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span class="text-gray-800 font-medium"> Exclusive area rights </span>
                                </div>
                            </div>
                        </div>
                        <!--4-->
                        
                         <div class="rounded-lg border bg-card text-card-foreground bg-gradient-to-a from-blue-50 to-indigo-50 border-blue-200 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="p-8">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-6 w-6 text-green-500" data-lov-id="src/pages/Index.tsx:283:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="283" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-6%20w-6%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span class="text-gray-800 font-medium"> Full franchisee support </span>
                                </div>
                            </div>
                        </div>
                        <!--5-->
                         <div class="rounded-lg border bg-card text-card-foreground bg-gradient-to-a from-blue-50 to-indigo-50 border-blue-200 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="p-8">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-check-big h-6 w-6 text-green-500" data-lov-id="src/pages/Index.tsx:283:20" data-lov-name="CheckCircle" data-component-path="src/pages/Index.tsx" data-component-line="283" data-component-file="Index.tsx" data-component-name="CheckCircle" data-component-content="%7B%22className%22%3A%22h-6%20w-6%20text-green-500%22%7D"><path d="M21.801 10A10 10 0 1 1 17 3.335"></path><path d="m9 11 3 3L22 4"></path></svg>
                                    <span class="text-gray-800 font-medium"> ROI within 6–12 months </span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
             <div class="w-100">
                <div class="mb-16">
                    <h2 class="text-4xl font-bold text-center text-gray-800 mb-12"> 🔷 How to Join</h2>
                    
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="grid md:grid-cols-5 gap-6">
                            
                            <div class=" text-center">
                                <div class="stepBox "> 1 </div>
                                <p class="text-gray-700 text-sm"> Submit your interest (online or by phone) </p>
                            </div>
                            
                            <div class=" text-center">
                                <div class="stepBox "> 2</div>
                                <p class="text-gray-700 text-sm"> Territory discussion + approval  </p>
                            </div>
                            
                             <div class=" text-center">
                                <div class="stepBox ">  3</div>
                                <p class="text-gray-700 text-sm"> Agreement signing & payment   </p>
                            </div>
                            
                             <div class=" text-center">
                                <div class="stepBox "> 4</div>
                                <p class="text-gray-700 text-sm"> Store setup & training </p> 
                            </div>
                            
                             <div class=" text-center">
                                <div class="stepBox "> 5</div>
                                <p class="text-gray-700 text-sm"> Begin operations & grow revenue </p> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="w-100">
                <div class="mb-16">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white text-center shadow-2xl ">
                        <h2  class="text-3xl font-bold mb-4 pt-2"> 📞 Contact for Franchise Inquiries</h2>
                        <p class="text-xl mb-6 pt-5 pb-5 text-white pt-2 pb-2" style="color:#fff"> Ready to start your franchise journey? Get in touch with us today!</p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                            <a class="callBtn" href="tel:917403005001">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-phone mr-2 h-5 w-5" data-lov-id="src/pages/Index.tsx:321:14" data-lov-name="Phone" data-component-path="src/pages/Index.tsx" data-component-line="321" data-component-file="Index.tsx" data-component-name="Phone" data-component-content="%7B%22className%22%3A%22mr-2%20h-5%20w-5%22%7D"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>Call Now</a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="clearfix"></div>
    </div>
    <!--start-carrer-->
    <!----- Comman-js-files ----->
    <script>
        $(document).ready(function () {
            $("#tab2").hide();
            $("#tab3").hide();
            $("#tab4").hide();
            $(".tabs-menu a").click(function (event) {
                event.preventDefault();
                var tab = $(this).attr("href");
                $(".tab-grid").not(tab).css("display", "none");
                $(tab).fadeIn("slow");
            });
        });
    </script>
</div>


