<style type="text/css">
    .Table
    {
        display: table;
		width:996px;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Row0
    {
        display: table-row;
        position: relative;
    }
    .Row0:hover
	{
		background-color:#FFC4C4;
		cursor:pointer;
	}
    .cell
    {
	float:left; border:1px solid #ccc; padding:5px; min-height:25px;
    }
    .cell0
    {
	float:left; border:1px solid #ccc; padding:5px; min-height:25px;
    }
	p
	{
		color:#C00;
	}
.content {
padding: 5px 0 5px 0;
background-color:#fafafa;
}
#vatued td,th
{
color:#000000;
border:1px solid black;
height:28px;
text-align:center;
}
#vatued
{
width:100%;
border-collapse:collapse;
}
#sub_td
{
	border:0px;
	text-align:left;
}

</style>
<script src="../js/jquery-1.10.2.js"></script>
<script>
jQuery(document).ready(function() {
    jQuery(".content").hide();
    jQuery(".Row0").click(function() {
        jQuery(this)
            .nextAll(".content:first").slideToggle(500)
            .siblings(".content").slideUp(500);
    });
});
</script>

<div align="center" style="width:1000px; min-height:600px;">
    <div class="Table">
        <div class="Title">
            <b>Applicant List</b>
        </div>
    <div class="Heading">
       <div>    
            <div class="cell" style="width:84px;">
      			<p>Serial No.</p>
            </div>    
            <div class="cell" style="width:252px;">
      			<p>Applicant Name</p>
            </div>    
            <div class="cell" style="width:474px;">
      			<p>Present Address</p>
            </div>    
            <div class="cell" style="width:138px;">
      			<p>Cell No.</p>
            </div><div style="clear:both;"></div>  
       </div> 
    </div>
        
<?php
	   $result01=mysql_query("select * from app_personal_info ORDER BY submit_moment ASC ");
	   $row01=mysql_num_rows($result01);
        $sl=0;
		while($rows01=mysql_fetch_array($result01))
		{
	   $app_id=$rows01[1];
	   $sl=$sl+1;
?>
        <div class="Row0">
            <div class="cell0" style="width:84px;">
                <span id="rowcontent"><?php echo $sl;?></span>
            </div>
            <div class="cell0" style="width:252px;">
                <span id="rowcontent"><?php echo $rows01[2];?></span>
            </div>
            <div class="cell0" style="width:474px;">
                <span id="rowcontent"><?php echo $rows01[5];?></span>
            </div>
            <div class="cell0" style="width:138px;">
                <span id="rowcontent"><?php echo $rows01[7];?></span>
            </div>
            <div style="clear:both;"></div>
        </div>
 <?php
	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");	
     list($app_y,$app_m,$app_d)=explode("-",$rows01[9]);
	 $app_month=$month_array[$app_m];
	 $app_birth_day=$app_d." ".$app_month." ".$app_y;

	$result02=mysql_query("SELECT * FROM app_photo WHERE app_id='$app_id'");
    $rows02=mysql_fetch_array($result02);
	$religio_array=array("","Islam","Hinduism","Christianity","Buddhism","Atheism","Bahaism","Chinese Universist","Chinese Universist","Confucianism","Ethno-religionist","Jainism","Neo-religionist","Secular/Nonreligious","Shinto","Sikhism","Spiritism","Taoism","Zoroastrianism","Other");
    $marital_array=array("","Unmarried","Married","Engaged","Separated","Divorced","Widower","Other");
	$gender_array=array("","Male","Female","Other");
    $blood_array=array("","A+","B+","O+","AB+","A-","B-","O-","AB-");
	
	
	$result0301=mysql_query("SELECT * FROM app_scholastic_status WHERE app_id='$app_id' and app_position=1");
    $rows0301=mysql_fetch_array($result0301);
    $noe_ssc_array=array("","SSC","Dakhil","O Level","Vocational","Equivalent");
    $gs_ssc_array=array("","Science","Humanities","Commerce","Business Studies","Others");
    $res_ssc_array=array("","First","Second","Third","A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","Appreared","On-going");
    $bu_ssc_array=array("","Barishal Board","Chittagong Board","Comilla Board","Dhaka Board","Jessore Board","Madrasah Board","Rajshahi Board","Rangpur Board","Sylhet Board","Technical Board","Foreign Institute","Others");
	
	
	$result0302=mysql_query("SELECT * FROM app_scholastic_status WHERE app_id='$app_id' and app_position=2");
    $rows0302=mysql_fetch_array($result0302);
    $noe_hsc_array=array("","HSC","Alim","A Level","Diploma","Equivalent");
    $gs_hsc_array=array("","Science","Humanities","Commerce","Business Studies","Others");
    $res_hsc_array=array("","First","Second","Third","A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","Appreared","On-going");
    $bu_hsc_array=array("","Barishal Board","Chittagong Board","Comilla Board","Dhaka Board","Jessore Board","Madrasah Board","Rajshahi Board","Rangpur Board","Sylhet Board","Technical Board","Foreign Institute","Others");
	
	
	$result0303=mysql_query("SELECT * FROM app_scholastic_status WHERE app_id='$app_id' and app_position=3");
    $rows0303=mysql_fetch_array($result0303);
	$noe_bsc_array=array("","BCom(Hons)","BSS(Hons)","BA(Hons)","BSc(Hons)","BSc.Ag(Hons)","BBA(Hons)","BBS(Hons)","B.Pharm(Hons)","LLB(Hons)","MBBS","Others(Hons)","BCom(Pass)","BSS(Pass)","BA(Pass)","BSc(Pass)","LLB(Pass)","Others(Pass)");
	$gs_bsc_array=array(
	                    "0"=>"",
	                    "1"=>"Accounting",
						"2"=>"Administration",
						"3"=>"Advertising",
						"4"=>"African Studies",
						"5"=>"Agribusiness",
						"6"=>"Agricultural Economics",
						"7"=>"Agricultural Education",
						"8"=>"Agricultural Engineering",
						"9"=>"Agriculture",
						"10"=>"American Studies",
						"11"=>"Ancient Studies",
						"12"=>"Animal Sciences",
						"13"=>"Anthropology",
						"14"=>"Archaeology",
						"15"=>"Architecture",
						"16"=>"Art History",
						"17"=>"Art and Design",
						"18"=>"Arts",
						"19"=>"Asian Studies",
						"20"=>"Astronomy",
						"21"=>"Aviation",
						"22"=>"Behavioral Sciences",
						"23"=>"Biochemistry",
						"24"=>"Biological Sciences",
						"25"=>"Biotechnology",
						"26"=>"Botany",
						"27"=>"Broadcast Engineering",
						"28"=>"Broadcast Journalism",
						"29"=>"Business",
						"30"=>"Business Administration Management",
						"31"=>"Business Management",
						"32"=>"Cellular Biology",
						"33"=>"Chemical Engineering",
						"34"=>"Chemistry",
						"35"=>"Child Development",
						"36"=>"Chinese Studies",
						"37"=>"Civil Engineering",
						"38"=>"Classics",
						"39"=>"Commerce",
						"40"=>"Communication",
						"41"=>"Communication Media",
						"42"=>"Comparative Literature",
						"43"=>"Computer Engineering",
						"44"=>"Computer Science",
						"45"=>"Consulting",
						"46"=>"Consumer Sciences",
						"47"=>"Creative Arts",
						"48"=>"Criminal Justice",
						"49"=>"Culinary Arts",
						"50"=>"Cultural Studies",
						"51"=>"Dairy Science",
						"52"=>"Dance",
						"53"=>"Dentistry",
						"54"=>"Earth Sciences",
						"55"=>"Ecology",
						"56"=>"Economic studies",
						"57"=>"Economics",
						"58"=>"Education",
						"59"=>"Electrical and Electronics Engineering",
						"60"=>"Engineering",
						"61"=>"English",
						"62"=>"English Teacher Education",
						"63"=>"Entomology",
						"64"=>"Environmental Engineering",
						"65"=>"Environmental Health",
						"66"=>"Environmental Studies",
						"67"=>"Ethnic Studies",
						"68"=>"European Studies",
						"69"=>"Family and Consumer Sciences",
						"70"=>"Fashion Merchandising",
						"71"=>"Film and Television Studies",
						"72"=>"Finance",
						"73"=>"Finance Accounting",
						"74"=>"Finance and Banking",
						"75"=>"Fine Arts",
						"76"=>"Food Science",
						"77"=>"Forestry",
						"78"=>"French",
						"79"=>"Gender and Diversity",
						"80"=>"Genetics",
						"81"=>"Geography",
						"82"=>"Geology",
						"83"=>"German",
						"84"=>"Gerontology",
						"85"=>"Graphic Arts",
						"86"=>"Greek",
						"87"=>"Health Science",
						"88"=>"Health Teacher Education",
						"89"=>"History",
						"90"=>"Horticulture Studies",
						"91"=>"Hospitality",
						"92"=>"Human Resources",
						"93"=>"Human Sciences",
						"94"=>"Humanities",
						"95"=>"Indian studies",
						"96"=>"Information Technology",
						"97"=>"Interior Design",
						"98"=>"International Business",
						"99"=>"Islamic Studies",
						"100"=>"Italian",
						"101"=>"Japanese",
						"102"=>"Jewish Studies",
						"103"=>"Journalism",
						"104"=>"Landscape Architecture",
						"105"=>"Languages",
						"106"=>"Latin",
						"107"=>"Law",
						"108"=>"Leadership Studies",
						"109"=>"Liberal Arts Sciences",
						"110"=>"Library Studies",
						"111"=>"Linguistics",
						"112"=>"Literature",
						"113"=>"Logistics",
						"114"=>"MBA",
						"115"=>"Malaysian Studies",
						"116"=>"Management",
						"117"=>"Management Information Systems",
						"118"=>"Marketing",
						"119"=>"Marketing Education",
						"120"=>"Materials Science",
						"121"=>"Mathematics",
						"122"=>"Mathematics Education",
						"123"=>"Mechanical Engineering",
						"124"=>"Mechatronics",
						"125"=>"Medical Dietetics",
						"126"=>"Medical Sciences",
						"127"=>"Medieval Studies",
						"128"=>"Microbiology",
						"129"=>"Military Studies",
						"130"=>"Mining Engineering",
						"131"=>"Museum Studies",
						"132"=>"Music",
						"133"=>"Music Performance",
						"134"=>"Music Teacher Education",
						"135"=>"Music Theory",
						"136"=>"Music Therapy",
						"137"=>"Nautical Studies",
						"138"=>"Near Eastern Studies",
						"139"=>"Nursing",
						"140"=>"Oceanography",
						"141"=>"Oncology",
						"142"=>"Paramedical Studies",
						"143"=>"Peace Studies",
						"144"=>"Pharmacy",
						"145"=>"Philosophy",
						"146"=>"Physical Education",
						"147"=>"Physical Sciences",
						"148"=>"Physical Therapy",
						"149"=>"Physics",
						"150"=>"Policy Management",
						"151"=>"Political Science",
						"152"=>"Poultry Science",
						"153"=>"Preschool Education",
						"154"=>"Primary education",
						"155"=>"Psychology",
						"156"=>"Public Health Education",
						"157"=>"Public Relations",
						"158"=>"Real Estate",
						"159"=>"Religious Studies",
						"160"=>"Retail Studies",
						"161"=>"Rhetorical Studies",
						"162"=>"Risk Management",
						"163"=>"Romance Languages",
						"164"=>"Russian Studies",
						"165"=>"Science",
						"166"=>"Science Teacher Education",
						"167"=>"Social Sciences",
						"168"=>"Social Studies",
						"169"=>"Sociology",
						"170"=>"Spanish",
						"171"=>"Special Education",
						"172"=>"Sport Administration",
						"173"=>"Sports",
						"174"=>"Statistics",
						"175"=>"Strategic Management",
						"176"=>"Studio Arts",
						"177"=>"Teacher Education",
						"178"=>"Theater Arts",
						"179"=>"Theology",
						"180"=>"Tourism",
						"181"=>"Training",
						"182"=>"Turf Management",
						"183"=>"Wilderness Management",
						"184"=>"Women's Studies",
						"185"=>"Writing",
						"186"=>"Zoology",
						"187"=>"Others Bachelors",
						"187"=>"Bangla"
						);
    $res_bsc_array=array("","First","Second","Third","A+","A","A-","B+","B","B-","C+","C","C-","D+","D","D-","Appreared","On-going");
    $bu_bsc_array=array(
	
	                 "0"=>"",
	
	                 "1"=>"Ahsanullah University of Science and Technology",
                        
                     "2"=>"America Bangladesh University",
                        
                     "3"=>"American International University Bangladesh",
                        
                     "4"=>"ASA University Bangladesh",
                        
                     "5"=>"Asian University for Women",
                        
                     "6"=>"Asian University of Bangladesh",
                        
                     "7"=>"Atish Dipankar University of Science &amp; Technology",
                        
                     "8"=>"Bangabandhu Sheikh Mujib Medical University",
                        
                     "9"=>"Bangabandhu Sheikh Mujibur Rahaman Science &amp; Technology University",
                        
                     "10"=>"Bangabandhu Sheikh Mujibur Rahman Agricultural University",
                        
                     "11"=>"Bangladesh Agricultural University, Mymensingh",
                        
                     "12"=>"Bangladesh Islami University",
                        
                     "13"=>"Bangladesh Open University",
                        
                     "14"=>"Bangladesh Textile University",
                        
                     "15"=>"Bangladesh University",
                        
                     "16"=>"Bangladesh University of Business &amp; Technology (BUBT)",
                        
                     "17"=>"Bangladesh University of Engineering &amp; Technology",
                        
                     "18"=>"Bangladesh University of Professionals",
                        
                     "19"=>"Barisal University",
                        
                     "20"=>"Begum Rokeya University",
                        
                     "21"=>"BGC Trust University Bangladesh, Chittagong",
                        
                     "22"=>"BRAC University",
                        
                     "23"=>"Central Women`s University",
                        
                     "24"=>"Chittagong University of Engineering &amp; Technology",
                        
                     "25"=>"Chittagong Veterinary and Animal Sciences University",
                        
                     "26"=>"City University",
                        
                     "27"=>"Comilla University",
                        
                     "28"=>"Daffodil International University",
                        
                     "29"=>"Darul Ihsan University",
                        
                     "30"=>"Dhaka International University",
                        
                     "31"=>"Dhaka University",
                        
                     "32"=>"Dhaka University of Engineering &amp; Technology",
                        
                     "33"=>"East Delta University, Chittagong",
                        
                     "34"=>"East West University",
                        
                     "35"=>"Eastern University",
                        
                     "36"=>"Gono Bishwabidyalay",
                        
                     "37"=>"Green University of Bangladesh",
                        
                     "38"=>"Hajee Mohammad Danesh Science &amp; Technology University",
                        
                     "39"=>"IBA, Dhaka University",
                        
                     "40"=>"IBAIS University",
                        
                     "41"=>"Independent University, Bangladesh",
                        
                     "42"=>"International Islamic University, Chittagong",
                        
                     "43"=>"International University of Business Agriculture &amp; Technology",
                        
                     "44"=>"Ishakha International University",
                        
                     "45"=>"Islamic University",
                        
                     "46"=>"Islamic University of Technology",
                        
                     "47"=>"Jagannath University",
                        
                     "48"=>"Jahangirnagar University",
                        
                     "49"=>"Jatiya Kabi Kazi Nazrul Islam University",
                        
                     "50"=>"Jessore Science &amp; Technology University",
                        
                     "51"=>"Khulna University",
                        
                     "52"=>"Khulna University of Engineering and Technology",
                        
                     "53"=>"Leading University, Sylhet",
                        
                     "54"=>"Manarat International University",
                        
                     "55"=>"Mawlana Bhashani Science &amp; Technology University",
                        
                     "56"=>"Metropolitan University, Sylhet",
                        
                     "57"=>"National University",
                        
                     "58"=>"Noakhali Science &amp; Technology University",
                        
                     "59"=>"Bangladesh Institute of Bank Management",
                        
                     "60"=>"North East University Bangladesh",
                        
                     "61"=>"North South University",
                        
                     "62"=>"Northern University Bangladesh",
                        
                     "63"=>"Pabna University of Science and Technology",
                        
                     "64"=>"Patuakhali Science And Technology University",
                        
                     "65"=>"Premier University, Chittagong",
                        
                     "66"=>"Presidency University",
                        
                     "67"=>"Prime University",
                        
                     "68"=>"Primeasia University",
                        
                     "69"=>"Queens University",
                        
                     "70"=>"Rajshahi University",
                        
                     "71"=>"Rajshahi University of Engineering &amp; Technology",
                        
                     "72"=>"Royal University of Dhaka",
                        
                     "73"=>"Shahjalal University of Science &amp; Technology",
                        
                     "74"=>"Shanto Mariam University of Creative Technology",
                        
                     "75"=>"Sher-e-Bangla Agricultural University",
                        
                     "76"=>"South Asian University	",
                        
                     "77"=>"Southeast University",
                        
                     "78"=>"Southern University of Bangladesh, Chittagong",
                        
                     "79"=>"Stamford University, Bangladesh",
                        
                     "80"=>"State University Of Bangladesh",
                        
                     "81"=>"Sylhet Agricultural University",
                        
                     "82"=>"Sylhet International University, Sylhet",
                        
                     "83"=>"The Millenium University",
                        
                     "84"=>"The Peoples University of Bangladesh",
                        
                     "85"=>"The University of Asia Pacific",
                        
                     "86"=>"United International University",
                        
                     "87"=>"University of Chittagong",
                        
                     "88"=>"University of Development Alternative",
                        
                     "89"=>"University of Information Technology &amp; Sciences",
                        
                     "90"=>"University of Liberal Arts Bangladesh",
                        
                     "91"=>"University of Science &amp; Technology, Chittagong",
                        
                     "92"=>"University of South Asia",
                        
                     "93"=>"Uttara University",
                        
                     "94"=>"Varendra University",
                        
                     "95"=>"Victoria University of Bangladesh",
                        
                     "96"=>"World University of Bangladesh",
                                    
                     "97"=>"Foreign Institute/University",
                     
                     "98"=>"Others");
					 
	$result0304=mysql_query("SELECT * FROM app_scholastic_status WHERE app_id='$app_id' and app_position=4");
    $rows0304=mysql_fetch_array($result0304);
    $noe_msc_array=array("","MBA","MBM","MBS","MCom","M.Pharm","MSc","MSc.Ag","MSS","MA","MS","LLM","Others");
	
	
	$result04=mysql_query("SELECT * FROM app_extra_status WHERE app_id='$app_id'");
    $rows04=mysql_fetch_array($result04);
	
	$result05=mysql_query("SELECT * FROM app_experience WHERE app_id='$app_id'");
    $rows05=mysql_fetch_array($result05);
	$app_type_array=array("","Part Time","Permanent","Contractual");
$orga_type_array=array("0"=>"","1"=>"Advertising Agency","2"=>"Agro based firms (incl. Agro Processing/Seed/GM)","3"=>"Airline/GSA","4"=>"Architecture/Interior Design Firm","5"=>"Audit Firms /Tax Consultant","6"=>"Automobile Companies","7"=>"Banks","8"=>"BPO","9"=>"Buying House (Garments)","10"=>"Call Center","11"=>"Cement Industry","12"=>"Chemical Industries","13"=>"Clearing &amp; Forwarding (C&amp;F) Companies","14"=>"Computer Hardware/Network Companies","15"=>"Consulting Firms","16"=>"Cosmetics/Personal Care","17"=>"Design/Printing/Publishing","18"=>"Development Agencies","19"=>"Direct Selling/Marketing Service Company","20"=>"Distribution Companies/Wholesale","21"=>"Education (School &amp; Colleges)","22"=>"Education (Universities)","23"=>"Electronic Equipment/Home Appliances","24"=>"Embassies/Foreign Consulate","25"=>"Engineering Firms","26"=>"Event Management","27"=>"Fisheries","28"=>"Food (Packaged)/Beverage","29"=>"Freight forwarding","30"=>"Furniture Manufacturer","31"=>"Garments (Woven/Apparel/Knitting)","32"=>"Garments Accessories","33"=>"Government Organizations","34"=>"Group of Companies","35"=>"Hospitals/Clinic/Diagnostic Centre","36"=>"Hotels/Resorts","37"=>"Immigration &amp; Education Consultancy Service","38"=>"Indenting Firm","39"=>"Insurance","40"=>"Investment/Merchant Banking","41"=>"ISP","42"=>"IT Enabled Service","43"=>"Jute Goods/ Jute Yarn","44"=>"Law Firm","45"=>"Leasing","46"=>"Logistic/Courier/Air Express Companies","47"=>"Manpower Recruitment","48"=>"Manufacturing (FMCG)","49"=>"Manufacturing (Light Engineering &amp; Heavy Industry)","50"=>"Market Research Firms","51"=>"Media/Public Relation Companies","52"=>"Medical Equipment","53"=>"Mobile Accessories","54"=>"Multinational Companies","55"=>"Newspaper/Magazine","56"=>"NGOs","57"=>"Overseas Companies","58"=>"Packaging Industry","59"=>"Pharmaceutical/Medicine Companies","60"=>"Plastic/ Polymer Industry","61"=>"Poultry/Dairy/Veterinary","62"=>"Power Equipment/Generator/CNG","63"=>"Real Estate/ Developer","64"=>"Research Organization","65"=>"Restaurants","66"=>"Retail/Shops","67"=>"Security Service Company","68"=>"Share Brokerage/ Securities House","69"=>"Shipping","70"=>"Shrimp/Hatchery","71"=>"Software Companies","72"=>"Sweater Industry","73"=>"Tannery/Footwear","74"=>"Tea Company","75"=>"Telecommunication","76"=>"Textile (Spinning, Weaving, Knitting, Dyeing/Finishing)","77"=>"Tobacco","78"=>"Trading or Export/Import","79"=>"Training Institutes","80"=>"Travel Agents/Tour Operators","81"=>"Others");
	
	
	if($rows05[13]!="")
	{
    list($from_y,$from_m,$from_d)=explode("-",$rows05[13]);
	$from_month=$month_array[$from_m];
	$serve_from=$from_d." ".$from_month." ".$from_y;
	}
	else
	{
	 $serve_from="";
	}
	if($rows05[14]==1)
	{
		$serve_till="Continue";
	}
	else
	{
	   if($rows05[14]!="")
	   {
		list($till_y,$till_m,$till_d)=explode("-",$rows05[14]);
		$till_month=$month_array[$till_m];
		$serve_till=$till_d." ".$till_month." ".$till_y;
	   }
	   else
	   {
		   $serve_till="";
	   }
	}
	
	
	$result0601=mysql_query("SELECT * FROM app_references WHERE app_id='$app_id' and position=1");
    $rows0601=mysql_fetch_array($result0601);
	$result0602=mysql_query("SELECT * FROM app_references WHERE app_id='$app_id' and position=2");
    $rows0602=mysql_fetch_array($result0602);
	   
?>   
<div class="content">
   <div style="width:980px; min-height:450px; margin:2px 8px 10px 8px; background-color: #CEE7FF;"><!--Page Area -->
   <div>
         
 <div align="center" style="width:980px; min-height:158px; border-bottom:1px solid #000;">
 <div>
 
 <div style="float:left; width:830px; min-height:150px;">
   <div style=" font-size:24px; font-weight:800; font-family:Verdana, Geneva, sans-serif;">RESUME</br>OF</div>
   <div style=" font-size:20px; font-weight:800; font-family:Verdana, Geneva, sans-serif;"><?php echo strtoupper($rows01[2]);?></div>
   <div style="">Address:<?php echo $rows01[5];?></div>
   <div style="">Cell No.:<?php echo $rows01[7];?></div>
   <div style="">E-mail:<?php echo $rows01[8];?></div>
 </div>
 
 <div style="float:left; width:150px; min-height:150px;">
 <img src="../../appimage/<?php echo $rows02[2];?>" height="150" width="150"  border="0"/>
 </div>
 
 <div style="clear:both;"></div>
 
 </div>
 </div>
 
 <div style="background:#C68C8C; height:32px;"><h3 style="color:#00F; margin:0 0 0 20px;">PERSONAL INFORMATION</h3></div>
 
 <div style="min-height:200px; width:930px; margin:5px 0 0 50px;">
  <table><tbody>
  <tr>
  <th id="sub_td">Name</th> <td width="3%">:</td> <td><?php echo $rows01[2];?></td>
  </tr>
  <tr>
  <th id="sub_td">Father Name</th> <td>:</td> <td><?php echo $rows01[3];?></td>
  </tr>
  <tr>
  <th id="sub_td">Mother Name</th> <td>:</td> <td><?php echo $rows01[4];?></td>
  </tr>
  <tr>
  <th id="sub_td">Present Address</th> <td>:</td> <td><?php echo $rows01[5];?></td>
  </tr>
  <tr>
  <th id="sub_td">Permanent Address</th> <td>:</td> <td><?php echo $rows01[6];?></td>
  </tr>
  <tr>
  <th id="sub_td">Cell No.</th> <td>:</td> <td><?php echo $rows01[7];?></td>
  </tr>
  <tr>
  <th id="sub_td">E-mail</th> <td>:</td> <td><?php echo $rows01[8];?></td>
  </tr>
  <tr>
  <th id="sub_td">Date of Birth</th> <td>:</td> <td><?php echo $app_birth_day;?></td>
  </tr>
  <tr>
  <th id="sub_td">Nationality</th> <td>:</td> <td><?php echo $rows01[10];?></td>
  </tr>
  <tr>
  <th id="sub_td">National ID No.</th> <td>:</td> <td><?php echo $rows01[11];?></td>
  </tr>
  <tr>
  <th id="sub_td">Religion</th> <td>:</td> <td><?php echo $religio_array[$rows01[12]];?></td>
  </tr>
  <tr>
  <th id="sub_td">Marital Status</th> <td>:</td> <td><?php echo $marital_array[$rows01[13]];?></td>
  </tr>
  <tr>
  <th id="sub_td">Gender</th> <td>:</td> <td><?php echo $gender_array[$rows01[14]];?></td>
  </tr>
  <tr>
  <th id="sub_td">Blood Group</th> <td>:</td> <td><?php echo $blood_array[$rows01[15]];?></td>
  </tr>
  </tbody></table>
 </div>
 <div style="background:#C68C8C; height:32px; margin-top:5px;"><h3 style="color:#00F; margin:0 0 0 20px;">SCHOLASTIC STATUS</h3></div>
 
        <div style="margin:10px 0 10px 10px; width:960px; min-height:150px;">
        
            <table id="vatued">
               <tr>
                 <th width="18%">Name of examination</th>
                 <th width="19%">Group/Subject</th>
                 <th width="11%">Result</th>
                 <th width="16%">Marks/<span style="font-size:11px;">GPA</span>&nbsp; - &nbsp;Out of</th>
                 <th width="24%">Board/University</th>
                 <th>Year of Passing</th>
               </tr>
               
               <tr>
                 <td>
                    <?php echo $noe_ssc_array[$rows0301[2]];?>                 
                 </td>
                 <td>
                    <?php echo $gs_ssc_array[$rows0301[3]];?>                 
                 </td>
                 <td>
                    <?php echo $res_ssc_array[$rows0301[4]];?>                 
                 </td>
                 <td>
                 <table style="border:0px;" width="100%"><tbody>
                 <tr>
                   <?php
				     if($rows0301[5]!=0)
					 {
				   ?>
                  <td style="border:0px;"><?php echo $rows0301[5];?></td>
                  <td style="border:0px;"> out of </td>
                  <td style="border:0px;"><?php echo $rows0301[6];?></td>
                   <?php
					 }
				     else
					 {
				   ?>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                   <?php
					 }
				   ?>
                 </tr>
                 </tbody></table>
                 </td>
                 <td>
                    <?php echo $bu_ssc_array[$rows0301[7]];?>                 
                  </td>
                 <td>
                    <?php echo $rows0301[8];?>                 
                </td>
               </tr>
               
               <tr>
                 <td>
                    <?php echo $noe_hsc_array[$rows0302[2]];?>                 
                 </td>
                 <td>
                    <?php echo $gs_hsc_array[$rows0302[3]];?>                 
                 </td>
                 <td>
                    <?php echo $res_hsc_array[$rows0302[4]];?>                 
                 </td>
                 <td>
                 <table style="border:0px;" width="100%"><tbody>
                 <tr>
                 
                   <?php
				     if($rows0302[5]!=0)
					 {
				   ?>
                  <td style="border:0px;"><?php echo $rows0302[5];?> </td>
                  <td style="border:0px;">out of</td>
                  <td style="border:0px;"><?php echo $rows0302[6];?> </td>
                   <?php
					 }
				     else
					 {
				   ?>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                   <?php
					 }
				   ?>
                 
                 </tr>
                 </tbody></table>
                 </td>
                 <td>
                    <?php echo $bu_hsc_array[$rows0302[7]];?>                 
                 </td>
                 <td>
                    <?php echo $rows0302[8];?>                 
                </td>
               </tr>
               
               <tr>
                 <td>
                    <?php echo $noe_bsc_array[$rows0303[2]];?>                 
                 </td>
                 <td>
                    <?php echo $gs_bsc_array[$rows0303[3]];?>                 
                 </td>
                 <td>
                    <?php echo $res_bsc_array[$rows0303[4]];?>                 
                 </td>
                 <td>
                 <table style="border:0px;" width="100%"><tbody>
                 <tr>
                 
                   <?php
				     if($rows0303[5]!=0)
					 {
				   ?>
                  <td style="border:0px;"><?php echo $rows0303[5];?> </td>
                  <td style="border:0px;">out of</td>
                  <td style="border:0px;"><?php echo $rows0303[6];?> </td>
                   <?php
					 }
				     else
					 {
				   ?>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                   <?php
					 }
				   ?>
                 
                 </tr>
                 </tbody></table>
                 </td>
                 <td>
                    <?php echo $bu_bsc_array[$rows0303[7]];?>                 
                 </td>
                 <td>
                    <?php echo $rows0303[8];?>                 
                </td>
               </tr>
               
               
               <tr>
                 <td>
                    <?php echo $noe_msc_array[$rows0304[2]];?>                 
                 </td>
                 <td>
                    <?php echo $gs_bsc_array[$rows0304[3]];?>                 
                 </td>
                 <td>
                    <?php echo $res_bsc_array[$rows0304[4]];?>                 
                 </td>
                 <td>
                 <table style="border:0px;" width="100%"><tbody>
                 <tr>
                 
                   <?php
				     if($rows0304[5]!=0)
					 {
				   ?>
                  <td style="border:0px;"><?php echo $rows0304[5];?> </td>
                  <td style="border:0px;">out of</td>
                  <td style="border:0px;"><?php echo $rows0304[6];?> </td>
                   <?php
					 }
				     else
					 {
				   ?>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                  <td style="border:0px;"></td>
                   <?php
					 }
				   ?>
                 
                 </tr>
                 </tbody></table>
                 </td>
                 <td>
                    <?php echo $bu_bsc_array[$rows0304[7]];?>                 
                 </td>
                 <td>
                    <?php echo $rows0304[8];?>                 
                </td>
               </tr>
               
            </table>
         </div> 
         
          <div style="width:960px; min-height:20px; color: #9F0000; margin:0 10px 0 10px; border-bottom:1px solid #333;">EXTRA CURRICULAM ACTIVITIES</div>
          <div style="margin:5px 0 10px 50px;  width:930px; min-height:15px;">
          <?php echo $rows04[2];?>
          </div>
          
          <div style="width:960px; min-height:20px; color: #9F0000; margin:0 10px 0 10px; border-bottom:1px solid #333;">OTHER SKILLS &amp; INFORMATION</div>
          <div style="margin:5px 0 10px 50px; width:930px; min-height:15px;">
          <?php echo $rows04[3];?>
          </div>
          
        <div style="background:#C68C8C; height:32px;"><h3 style="color:#00F; margin:0 0 0 20px;">EXPERIENCE</h3></div>

        <div style="margin:10px 0 10px 10px; width:960px; min-height:200px;">
        <table width="100%"><tbody>
          <tr>
           <td width="15%" valign="top"><b>Organization Name</b></td>
           <td width="1%" valign="top">:</td>
           <td width="30%" valign="top"><?php echo $rows05[2];?></td>
           <td width="2%">&nbsp;</td>
           <td width="21%" valign="top"><b>Type of Employment</b></td>
           <td width="1%" valign="top">:</td>
           <td width="30%" valign="top"><?php echo $app_type_array[$rows05[3]];?></td>
          </tr>
          
          <tr>
           <td valign="top"><b>Organization Type</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $orga_type_array[$rows05[4]];?></td>
           <td>&nbsp;</td>
           <td valign="top"><b>Position Held</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[5];?></td>
          </tr>
          
          <tr>
           <td valign="top"><b>Department</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[6];?></td>
           <td >&nbsp;</td>
           <td valign="top"><b>Unit</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[7];?></td>
          </tr>
          
          
          <tr>
           <td valign="top"><b>Major responsibilities</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[15];?></td>
           <td >&nbsp;</td>
           <td valign="top"><b>Organization Address</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[17];?></td>
          </tr>
          
          
          <tr>
           <td valign="top"><b>Job Location</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[8];?></td>
           <td >&nbsp;</td>
           <td valign="top"><b>Key Achievement</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[16];?></td>
          </tr>
          
          <tr>
           <td valign="top"><b>Name of Supervisor</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[9];?></td>
           <td >&nbsp;</td>
           <td valign="top"><b>Supervisor&prime;s Contact No.</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[10];?></td>
          </tr>
          
          <tr>
           <td valign="top"><b>Supervisor&prime;s Email</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[11];?></td>
           <td >&nbsp;</td>
           <td valign="top"><b>Any reservation contacting your employer</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $rows05[12];?></td>
          </tr>
          
          
          <tr>
           <td valign="top"><b>Served From</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $serve_from;?></td>
           <td >&nbsp;</td>
           <td valign="top"><b>Served Till</b></td>
           <td valign="top">:</td>
           <td valign="top"><?php echo $serve_till;?></td>
          </tr>
        </tbody></table>
        </div>
        <div style="background:#C68C8C; height:32px;"><h3 style="color:#00F; margin:0 0 0 20px;">REFERENCES</h3></div>
        
        <div style="margin:10px 0 10px 10px; width:960px; min-height:200px;">
          <table width="100%"><tbody>
          
            <tr>
              <td width="14%"></td>
              <td width="2%"></td>
              <td width="42%" style="color:#BC3030; font-weight:800;">Reference-I</td>
              <td width="42%" style="color:#BC3030; font-weight:800;">Reference-II</td>
            </tr>
            
            <tr>
              <td><b>Name</b></td>
              <td>:</td>
              <td>
              <?php echo $rows0601[2];?>
              </td>
              <td>
              <?php echo $rows0602[2];?>
                </td>
            </tr>
            <tr>
              <td>Designation</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[3];?>
               </td>
              <td>
              <?php echo $rows0602[3];?>
                </td>
            </tr>
            <tr>
              <td>Organization</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[4];?>
                </td>
              <td>
              <?php echo $rows0602[4];?>
              </td>
            </tr>
            <tr>
              <td>Mailing Address</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[5];?>
                </td>
              <td>
              <?php echo $rows0602[5];?>
               </td>
            </tr>
            <tr>
              <td>Phone Number</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[6];?>
                </td>
              <td>
              <?php echo $rows0602[6];?>
               </td>
            </tr>
            <tr>
              <td>Cell Number</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[7];?>
                </td>
              <td>
              <?php echo $rows0602[7];?>
               </td>
            </tr>
            <tr>
              <td>Email Address</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[8];?>
               </td>
              <td>
              <?php echo $rows0602[8];?>
               </td>
            </tr>
            <tr>
              <td>Relation</td>
              <td>:</td>
              <td>
              <?php echo $rows0601[9];?>
               </td>
              <td>
              <?php echo $rows0602[9];?>
                </td>
            </tr>
          </tbody></table>
        </div> 
        
   </div>
   </div>

</div>
<?php
		}
?>
    </div>
</div>