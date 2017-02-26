<style type="text/css">
#first
{
	width:994px;
	height:38px;
	margin:10px 2px 2px 2px;
	padding-top:7px;
	font-family: Tahoma, Geneva, sans-serif;
	border:1px solid #ccc;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;
}
#second
{
	margin:5px 2px 2px 2px;
	padding-top:7px;
	font-family:Verdana, Geneva, sans-serif;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;
}

#second01
{
	width:490px;
	height:25px;
}
.second01col1
{
	float:left;
	width:235px;
	height:25px;
	padding-left:10px;
	background-color: #D6D6EB;
}
.second01col2
{
	float:left;
	width:235px;
	height:25px;
	text-align:right;
	padding-right:10px;
	background-color: #CCE6FF;
}

.second01col01
{
	float:left;
	width:235px;
	height:25px;
	padding-left:10px;
	background-color: #CCE6FF;
}
.second01col02
{
	float:left;
	width:235px;
	height:25px;
	text-align:right;
	padding-right:10px;
	background-color: #D6D6EB;
}

#total01
{
	width:490px;
	height:25px;
	background-color:#B3B3FF;
	color:#970000;
}

#netsalary
{
	width:490px;
	height:30px;
	padding-top:5px;
	background-color:#999;
	color:#000;
	font-weight:bold;
}


.total01col1
{
	float:left;
	width:235px;
	height:25px;
	padding-left:10px;
}
.total01col2
{
	float:left;
	width:235px;
	height:25px;
	text-align:right;
	padding-right:10px;
}
#remuneration, #festivalbonus, #earningothers, #providentfund, #professiontax, #deductionothers
{
	border : 1px solid #999;
    width:100px;
	height:22px;
	text-align:right;
	font-weight:800;
}
#remuneration:focus, #festivalbonus:focus, #earningothers:focus, #providentfund:focus, #professiontax:focus, #deductionothers:focus
{
    border : 1px solid #990000;
	color:#FF0000;
}

#totaladdition, #totaldeduction
{
	border : 1px solid none;
	background-color:transparent;
	color:#AE592A;
    width:100px;
	height:22px;
	text-align:right;
	font-weight:800;

}

#netsalarycal
{
	border:0px;
	background-color:transparent;
	font-size:18px;
	color:#000;
    width:100px;
	height:25px;
	text-align:right;
	font-weight:bold;

}

#submit
{
   width:auto;
   height:30px;
   font-weight:bold;
   padding-left:0px;
   cursor:pointer;   
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

#submit:hover
{
   background-color:#000000;
   color:#FFFFFF;
   width:auto;
   height:30px;
   font-weight:bold;
   padding-left:0px;
   cursor:pointer;   
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}


{
   width:100px;
   height:30px;
   padding-left:0px;
   cursor:pointer;   
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}


#empid
{ 
	font-family : Arial, Verdana, sans-serif;
	font-size: 1em;
	line-height:140%;
	color : #000; 
	padding : 3px; 
	border : 1px solid #999;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	-khtml-border-radius: 5px;
	border-radius: 5px;
	width:200px;
}
#empid:focus
{ 
    border : 1px solid #990000;
	color:#FF0000;
}
a
{
	text-decoration:none;
}
a:hover
{
	text-decoration:underline;
	color:#F00;
}

</style>
<script type="text/javascript" src="../js/salary_slip_id.js"></script>
<script type="text/javascript">
function updatesum() {
document.salaryform.totaladdition.value =(document.salaryform.basicsalary.value -0) + (document.salaryform.houseallowance.value -0)+ (document.salaryform.medicalallowance.value -0) + (document.salaryform.conveyance.value -0) + (document.salaryform.remuneration.value -0) + (document.salaryform.festivalbonus.value -0) + (document.salaryform.earningothers.value -0);

document.salaryform.totaldeduction.value = (document.salaryform.absencecal.value -0) + (document.salaryform.delaycal.value -0) + (document.salaryform.providentfund.value -0) + (document.salaryform.professiontax.value -0) + (document.salaryform.deductionothers.value -0);

document.salaryform.netsalarycal.value=(document.salaryform.totaladdition.value -0) - (document.salaryform.totaldeduction.value -0);
}
</script>
    <div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
    <div align="center" style="color: #F00;  font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message1'];?></div>
<div style="width:1000px; min-height:600px;">
  <form name="salaryform" action="salary_page_insert.php" method="post">
    <div id="first">
    
      <div style=" float:left; margin-left:100px;">
       Employee ID: <input type="text" id="empid" name="empid" autocomplete="off" onkeyup="show(this.value)"/>
       </div>
       
      <div style=" float:right; margin-right:50px;">
       <a href="salary_list.php?ac=salary">View salary list</a>
      </div>
       
       <div style="clear:both;"></div>
    </div>
    <div>
       <span id="3nd"></span>
    </div>
   </form>
</div>