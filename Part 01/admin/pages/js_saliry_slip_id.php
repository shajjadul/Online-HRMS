<?php
	$value=$_GET['q'];
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	$result01=mysql_query("SELECT * FROM add_employee WHERE emp_id='$value' and status='1'");
	$rows01=mysql_num_rows($result01);
	
	
	$field01=mysql_fetch_array($result01);
	$department_array=array("1"=>"Evolution Group Ltd.",
						   "2"=>"Evolution Migration Ltd.",
						   "3"=>"Evolution Overseas Studies Ltd.",
						   "4"=>"Evolution IT Ltd.",
						   "5"=>"Evolution Tours &amp; Travels Ltd.",
						   "6"=>"Evolution Trading &amp; Consultency Ltd.");
    $result02 = mysql_query('SELECT LAST_DAY(CURDATE() - INTERVAL 1 MONTH) AS `Last Day Of Previous Month');
	$field02=mysql_fetch_array($result02);
	
	
	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
	
	list($apply_y,$apply_m,$apply_d)=explode("-",$field02[0]);
	$apply_month=$month_array[$apply_m];
	
	
	
    $result03 = mysql_query("SELECT * FROM holiday WHERE HoliDayDate like '$apply_y-$apply_m%'");
	$rows03=mysql_num_rows($result03);
	//$field03=mysql_fetch_array($result03);
	$workingdays=$apply_d-$rows03;
	
    $result04 = mysql_query("SELECT SUM(TotalWorkingDays) FROM emp_leave_app WHERE TypeOfLeave!=5 and FromStart like '$apply_y-$apply_m%' and status='1'");
	//$rows04=mysql_num_rows($result04);
	$field04=mysql_fetch_array($result04);
	$leave=$field04[0]+0;
	
	
    $result041 = mysql_query("SELECT SUM(TotalWorkingDays) FROM emp_leave_app WHERE TypeOfLeave=5 and FromStart like '$apply_y-$apply_m%' and status='1'");
	//$rows04=mysql_num_rows($result04);
	$field041=mysql_fetch_array($result041);
	$unpaidleave=$field041[0]+0;
	
	
	
    $result05 = mysql_query("SELECT * FROM  emp_attendance WHERE emp_id='$value' and emp_atten_date like '$apply_y-$apply_m%' and status='1'");
	$rows05=mysql_num_rows($result05);
	//$field05=mysql_fetch_array($result05);
	
	$absences=$workingdays-($field04[0]+$field041[0]+$rows05);
	$panelty=$workingdays-($field04[0]+$rows05);
	
    $result06 = mysql_query("SELECT * FROM  emp_attendance WHERE emp_id='$value' and emp_atten_date like '$apply_y-$apply_m%' and emp_atten_time>'10:15:00' and status='1'");
	$rows06=mysql_num_rows($result06);
	$delayrules=floor($rows06/3);
	
	
	$result07=mysql_query("SELECT * FROM  emp_salary WHERE EmpId ='$value' order by submit_date DESC limit 1");
	//$rows07=mysql_num_rows($result01);
	$field07=mysql_fetch_array($result07);
	
	@$departmentconvert=$department_array[$field07[7]];
	
	$houseallowance=round(($field07[2]/100)*$field07[3],2);
	$medicalallowance=round(($field07[2]/100)*$field07[4],2);
	$conveyance=round(($field07[2]/100)*$field07[5],2);
	
	$totaladdition=$field07[2]+$houseallowance+$medicalallowance+$conveyance;
	
    $absencecal=round((($totaladdition/$apply_d)*$panelty),2);
	
    $delaycal=round((($totaladdition/$apply_d)*$delayrules),2);
	
	$totaldeduction=$absencecal+$delaycal+0;
	
	$netsalarycal=round(($totaladdition-$totaldeduction),2);


	
	//$applydate=$apply_d." ".$apply_month." ".$apply_y;
	  //$dtLastDay = date("j/n/Y", mktime(0, 0, 0, date("m")+1 , date("d")-date("d"), date("Y"))); 
	if($rows01==1)
	  {
?>
        <div id="second">
           <div style="margin-left:300px; margin-bottom:5px;">
           <b>Employee Name:</b> <?php echo $field01[1]; ?><br />
           <b>Designation:</b> <?php echo $field07[6]; ?><input type="hidden" name="Designation" value="<?php echo $field07[6]; ?>" /><br />
           <b>Department:</b> <?php echo $departmentconvert; ?><input type="hidden" name="Department" value="<?php echo $departmentconvert; ?>" /><br />
           <b>Month:</b> <?php echo $apply_month; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Year:</b>  <?php echo $apply_y; ?>
           <input type="hidden" name="SalaryMonth" value="<?php echo $apply_y.'-'.$apply_m; ?>" />
           </div>
           
           
           <div align="center" style="height:25px; margin-left:20px;">
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:1px; background-color:#ccc;">
              Total days: <b><?php echo $apply_d; ?></b><input type="hidden" name="TotalDays" value="<?php echo $apply_d; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Working days: <b><?php echo $workingdays; ?></b><input type="hidden" name="WorkingDays" value="<?php echo $workingdays; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Holidays: <b><?php echo $rows03; ?></b><input type="hidden" name="Holidays" value="<?php echo $rows03; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Leaves: <b><?php echo $leave; ?></b><input type="hidden" name="Leaves" value="<?php echo $leave; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Unpaid Leaves: <b><?php echo $unpaidleave; ?></b><input type="hidden" name="UnpaidLeave" value="<?php echo $unpaidleave; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Presents: <b><?php echo $rows05; ?></b><input type="hidden" name="Presents" value="<?php echo $rows05; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Absences: <b><?php echo $absences; ?></b><input type="hidden" name="Absences" value="<?php echo $absences; ?>" />
              </div>
              <div style="float:left; padding-left:5px; padding-right:5px; margin-left:3px; background-color:#ccc;">
              Delays: <b><?php echo $rows06; ?></b><input type="hidden" name="Delays" value="<?php echo $rows06; ?>" />
              </div>
              
              <div style="clear:both;"></div>
           </div>
           

           <div style="width:994px;">
           
             <div style="float:left; width:490px;">
               <div style="width:490px; height:25px; background-color:#B3B3FF; color:#970000; font-weight:700;">&nbsp;&nbsp;Earnings</div>
               
               <div id="second01">
                 <div class="second01col1">
                    Basic Salary
                 </div>
                 
                 <div class="second01col2">
                    <?php echo $field07[2]; ?><input type="hidden" name="basicsalary" value="<?php echo $field07[2]; ?>" />
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
               <div id="second01">
                 <div class="second01col01">
                    House allowance
                 </div>
                 
                 <div class="second01col02">
                    <?php echo $houseallowance; ?><input type="hidden" name="houseallowance" value="<?php echo $houseallowance; ?>" />
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               <div id="second01">
                 <div class="second01col1">
                    Medical allowance
                 </div>
                 
                 <div class="second01col2">
                    <?php echo $medicalallowance; ?><input type="hidden" name="medicalallowance" value="<?php echo $medicalallowance; ?>" />
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               <div id="second01">
                 <div class="second01col01">
                     Conveyance
                 </div>
                 
                 <div class="second01col02">
                    <?php echo $conveyance; ?><input type="hidden" name="conveyance" value="<?php echo $conveyance; ?>" />
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               <div id="second01">
                 <div class="second01col1">
                   Remuneration
                 </div>
                 
                 <div class="second01col2">
                    <input type="text" name="remuneration" value="0" id="remuneration" maxlength="10" onKeyUp="updatesum()"/>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
               <div id="second01">
                 <div class="second01col01">
                    Festival bonus
                 </div>
                 
                 <div class="second01col02">
                    <input type="text" name="festivalbonus" value="0" id="festivalbonus" maxlength="10" onKeyUp="updatesum()"/>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
               <div id="second01">
                 <div class="second01col1">
                    Others
                 </div>
                 
                 <div class="second01col2">
                    <input type="text" name="earningothers" value="0" id="earningothers" maxlength="10" onKeyUp="updatesum()"/>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               <div id="total01">
                 <div class="total01col1">
                    Total Addition
                 </div>
                 
                 <div class="total01col2">
                    <input name="totaladdition" value="<?php echo $totaladdition; ?>" id="totaladdition" readonly>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
             </div>
             
             <div style="float:right; width:490px;">
               <div style="width:490px; height:25px; background-color:#B3B3FF; color:#970000; font-weight:700;">&nbsp;&nbsp;Deductions</div>
               
               
               <div id="second01">
                 <div class="second01col01">
                    Absence
                 </div>
                 
                 <div class="second01col02">
                    <?php echo $absencecal; ?><input type="hidden" name="absencecal" value="<?php echo $absencecal; ?>" />
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               <div id="second01">
                 <div class="second01col1">
                    Delay
                 </div>
                 
                 <div class="second01col2">
                    <?php echo $delaycal; ?><input type="hidden" name="delaycal" value="<?php echo $delaycal; ?>" />
                 </div>
               <div style="clear:both;"></div>
               
               </div>

               
               <div id="second01">
                 <div class="second01col01">
                    Provident Fund
                 </div>
                 
                 <div class="second01col02">
                    <input type="text" name="providentfund" value="0" id="providentfund" maxlength="10" onKeyUp="updatesum()"/>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
               <div id="second01">
                 <div class="second01col1">
                     Profession Tax
                 </div>
                 
                 <div class="second01col2">
                    <input type="text" name="professiontax" value="0" id="professiontax" maxlength="10" onKeyUp="updatesum()"/>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               <div id="second01">
                 <div class="second01col01">
                   Others
                 </div>
                 
                 <div class="second01col02">
                    <input type="text" name="deductionothers" value="0" id="deductionothers" maxlength="10" onKeyUp="updatesum()"/>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
               <div id="total01">
                 <div class="total01col1">
                    Total Deduction
                 </div>
                 
                 <div class="total01col2">
                    <input name="totaldeduction" value="<?php echo $totaldeduction; ?>" id="totaldeduction" readonly>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
               <div id="netsalary">
                 <div class="total01col1">
                    Net Salary
                 </div>
                 
                 <div class="total01col2">
                    <input name="netsalarycal" value="<?php echo $netsalarycal; ?>" id="netsalarycal" readonly>
                 </div>
               <div style="clear:both;"></div>
               
               </div>
               
               
               
             </div>
             
             <div style="clear:both;"></div>
           
           </div>  
           
           <div align="center" style="margin:25px 0 10px 0;"><input type="submit" id="submit" value="Create salary slip"/></div>
           
             
        </div>
        
<?php
	  }
?>