<style type="text/css">
ul.left_list {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 15px;
font-style: normal;
line-height: 2em;
font-weight: 700;
font-variant: normal;
text-transform: none;
color: #600;
text-decoration: none;
text-indent: -2px;
list-style-position: outside;
list-style-image: url(sqpurple.gif);
list-style-type: square;
padding: 6px;
margin:2px 2px 2px 5px;
cursor:pointer;
}
</style>
<div style="width:1000px; min-height:600px;">

   <div style="width:200px; min-height:600px; float:left; background-color:#0F0F0F;">
   
     <div style="width:180px; min-height:100px; margin:50px 0 0 10px;">
     <ul class="left_list" style="color:#00FFFF;">
     
       <li>
		<div onClick="window.open('add_emp_popup_form.php','popuppage','width=400,toolbar=1,resizable=1,scrollbars=yes,height=600,top=100,left=350');">New employee</div>
       </li>
       
       <li>
		<div onClick="window.open('termination_form.php','popuppage','width=400,toolbar=1,resizable=1,scrollbars=yes,height=500,top=100,left=350');">Termination</div>
       </li>
       
       <li>
		<div onClick="window.open('add_salary_form.php','popuppage','width=400,toolbar=1,resizable=1,scrollbars=yes,height=500,top=100,left=350');">Add Salary</div>
       </li>
       
       <li>
		<div onClick="window.open('increment_form.php','popuppage','width=400,toolbar=1,resizable=1,scrollbars=yes,height=600,top=100,left=350');">Increment</div>
       </li>
       
     </ul>
     </div>
   
   </div>
   
   <div style="width:800px; min-height:600px; float:left;  background-color: #F2F2F2; background-image:url(../icon/whitey.jpg);">
   
     <?php
		include("home_right.php");
     ?>
   
   </div>
   
   
   <div style="clear:both;"></div>
   
</div>

