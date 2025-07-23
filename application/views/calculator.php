

<style>
    .row{margin: 0px; padding: 0px;}
    .calculator_left{padding-bottom: 20px;}
    .calculator_left h2{
        font-weight: bold;
        font-size: 22px;
    }
    .calculator_left h5{
         padding-top: 20px;
        font-weight: bold;
        font-size: 16px;
    }
    .calculator_left p{
        font-size: 14px;
        text-align: justify;
        padding-right: 30px;
    }
    .calculator_right{padding-right: 50px;padding-top: 20px;}
    .calculator_right .calc_right_inner{
        border: 2px solid #e6e6e6;
        box-shadow: 8px 10px 12px -5px #d7d7d7;
    }
    .calculator_right .calc_right_inner h6{
        margin-top: -10px;
        margin-left: 10px;
        font-size: 16px;
        font-weight: bold;
    }
    .calc_input .row{padding-bottom: 20px;}
    .calc_input label{padding-top: 5px;color: #666679;}
    .calc_input button{
        background: #CA0000;
        color: white;
        border-radius: 3px;
    }
   
    .calc_input button:hover{color: #FFCC00;}
    @media(max-width:740px){.calculator_right{padding-right: 0px;}}
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 calculator_left">
            <h2>Tools</h2>
            <p>We have developed a collection of useful tools and other resources to assist you with the planning, costing and tracking of your shipments.</p>
            <h5>Volume Conversion</h5>
            <p>As per international requirements, your shipment costs are based on volume as well as weight. Use our volume conversion tool to determine your shipment’s volumetric weight, and then compare it with the actual weight. The higher weight will be used to calculate your shipping cost.</p>
        </div>
        <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 calculator_right">
            <div class="calc_right_inner">
                <h6 style="background: white;float: left;">Volume Conversion Tool</h6>
                <div class="row" style="padding: 10px 0px 15px 0px;">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <p>Units of Measure:</p>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="padding-top: 10px;">
                        <input type="radio" name="unit" value="cm" checked="checked" />&nbsp;cm/kg
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-md-8 col-sm-8 col-xs-12 calc_input">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"><label>Length:</label></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12"><input id="length" type="text" name="length" value="" style="float: left; width: 40%;border: 1px solid #cbcbcb;color: #666679;"/>&nbsp;&nbsp;<p style="float: left;" class="print_unit"> &nbsp;&nbsp;cm</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"><label>Width:</label></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12"><input id="width"  type="text" name="width" value="" style="float: left; width: 40%;border: 1px solid #cbcbcb;color: #666679;"/>&nbsp;&nbsp;<p style="float: left;" class="print_unit"> &nbsp;&nbsp;cm</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"><label>Height:</label></div>
                            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12"><input id="height" type="text" name="height" value="" style="float: left; width: 40%;border: 1px solid #cbcbcb;color: #666679;"/>&nbsp;&nbsp;<p style="float: left;" class="print_unit"> &nbsp;&nbsp;cm</p></div>
                        </div>
                        <div class="row">
                            <button onClick="calculate()">Calculate</button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                        <img src="<?php echo resource('frontend')?>images/Courier-Man.png" alt="image" class="img-responsive"/>
                    </div>
                </div>
                <div class="row" style="padding: 0px 10px 20px 10px;">
                    <p style="padding-left: 10px;font-size: 15px;font-weight: bold;border-top: 1px solid #CA0000;">Volumetric Weight:&nbsp;<span id="weight"></span>kg</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function calculate()
{

    var height = document.getElementById("height").value;
    var width = document.getElementById("width").value;
	var length = document.getElementById("length").value;
	document.getElementById("weight").innerHTML = height * width * length/5000;
       
}

</script>



