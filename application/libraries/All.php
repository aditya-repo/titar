<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';

class All extends FPDF {


	function getData($application,$realApplication,$sendingData){

			$host ="https://admission.ppuponline.in/api/GetStudentData.ashx?i=".$application."&t=".APIKEY;
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_VERBOSE, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_AUTOREFERER, false);
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // <-- don't forget this
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // <-- and this

			$result = curl_exec($ch);
			curl_close($ch);
			$data =  json_decode($result);
			// var_dump($data);
			$this->student = $sendingData[0];
			$this->college = $sendingData[1];
			$this->subjects = $sendingData[2];
			$this->fees = $sendingData[3];
			$this->allSubjects = $sendingData[4];
			$this->content($data,$realApplication);

			// var_dump($data);
			}

			


		function content($data,$applicationNo) {
			$this->SetFont('Arial','B',14);
			// Move to the right
			// Title
			$this->SetY(4);
			$this->Cell(0,7,$this->college['code']."-".$this->college['name'],0,1,'C');
			$this->SetFont('Arial','B',11);
			$this->Cell(0,5,'Under-Graduate (UG) Admission Application Form',0,1,'C');
			$this->SetFont('Arial','B',9);
			$this->Cell(0,5,'SESSION 2020-2023',0,1,'C');
			$this->SetFont('Arial','',10);

			$this->Ln(15);

			   //passport photo & signature
			$this->SetY(26);
			$this->Cell(155);
			if (file_exists("back/uploads/images/photos/".$applicationNo.".jpg")) {
			$this->Image("back/uploads/images/photos/".$applicationNo.".jpg",167,24,30,40);
			}
			//$this->Cell(30,33,'',1,0,"C");

			$this->SetY(60);
			$this->Cell(155);
			if (file_exists("back/uploads/images/sign/".$applicationNo.".jpg")) {

			$this->Image("back/uploads/images/sign/".$applicationNo.".jpg",167,70,30,10);}
			//$this->Cell(30,11,'',1,0,"C");

			$this->SetY(70);
			$this->Cell(155);
			$this->Cell(30,9,'',0,0,"C");

			   //candidate details
			$this->SetY(18);
			$this->SetFont('Arial','B',11);
			$this->Cell(0,8,'UAN # '. $data->Profile[0]->SLogin,0,0,"L");
			$this->SetFont('Arial','B',9);
			$this->Cell(-32,8,'',0,1,"R");
			$this->Cell(0,0,'',0,1,"C");
			

			$this->Cell(3,5,"1.",0,0,"C");
			$this->Cell(31,5,'Candidate Name :  ',0,0,"L");
			$this->Cell(120,5,$data->Profile[0]->CandidateName,1,1,"l");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"2.",0,0,"C");
			$this->Cell(31,5,"Father's Name :  ",0,0,"L");
			$this->Cell(120,5,$data->Profile[0]->FatherName,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"3.",0,0,"C");
			$this->Cell(31,5,"Mother's Name :  ",0,0,"L");
			$this->Cell(120,5,$data->Profile[0]->MotherName,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"4.",0,0,"C");
			$this->Cell(31,5,"Date of Birth :  ",0,0,"L");
			$this->Cell(48,5,$data->Profile[0]->BirthDate,1,0,"L");

			$this->Cell(10,5,"5.",0,0,"R");
			$this->Cell(24,5,"Gender :",0,0,"L");
			$this->Cell(38,5,$data->Profile[0]->GenderName,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"6.",0,0,"C");
			$this->Cell(31,5,"Category :  ",0,0,"L");
			$this->Cell(48,5,$data->Profile[0]->VReservation,1,0,"L");

			$this->Cell(10,5,"7.",0,0,"R");
			$this->Cell(24,5,"Sub Category :",0,0,"L");
			$this->Cell(38,5,$data->Profile[0]->HReservation,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"8.",0,0,"C");
			$this->Cell(31,5,"Other Category :  ",0,0,"L");
			$this->Cell(48,5,$data->Profile[0]->CategoryName,1,0,"L");

			$this->Cell(10,5,"9.",0,0,"R");
			$this->Cell(24,5,"Aadhar :",0,0,"L");
			$this->Cell(38,5,$data->Profile[0]->UID_AADHAARNo,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"10.",0,0,"C");
			$this->Cell(31,5,"Domicile :  ",0,0,"L");
			$this->Cell(48,5,$data->Profile[0]->DomicileStateName,1,0,"L");
			$this->Cell(10,5,"11.",0,0,"R");
			$this->Cell(24,5,"Dom. Cert. :",0,0,"L");
			$this->Cell(38,5,$data->Profile[0]->DomicileCertificateNo,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"12.",0,0,"C");
			$this->Cell(31,5,"Religion :  ",0,0,"L");
			$this->Cell(48,5,$data->Profile[0]->Religion,1,0,"L");
			$this->Cell(10,5,"13.",0,0,"R");
			$this->Cell(24,5,"Minority :",0,0,"L");
			$this->Cell(38,5,$data->Profile[0]->IsMinority,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"14.",0,0,"C");
			$this->Cell(31,5,"Nationality :  ",0,0,"L");
			$this->Cell(48,5,$data->Profile[0]->Nationality,1,0,"L");
			$this->Cell(10,5,"15.",0,0,"R");
			$this->Cell(24,5,"EWS status :",0,0,"L");
			$this->Cell(38,5,'',1,1,"C");
			$this->Cell(0,1,'',0,1,"C");

			   //correspondance address
			$corr = $data->Profile[0]->CAddress."\r\n".$data->Profile[0]->CDistrict."\n".$data->Profile[0]->CPinCode;
			$this->Cell(3,5,"16.",0,0,"C");
			$this->Cell(36,5,"Correpondance Add. :  ",0,0,"L");
			$this->Cell(147,5,$corr,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$perm = $data->Profile[0]->PAddress."\n".$data->Profile[0]->PDistrict."\n".$data->Profile[0]->PPinCode;
			$this->Cell(3,5,"17.",0,0,"C");
			$this->Cell(36,5,"Permanent Add. :  ",0,0,"L");
			$this->Cell(147,5,$perm,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");
		
			   //permanent address

			$this->Cell(-0.5);
			$this->Cell(4,5,"18.",0,0,"C");
			$this->Cell(23,5,"Mobile :       ",0,0,"L");
			$this->Cell(12.5);
			$this->Cell(40,5,$data->Profile[0]->MobileNo,1,0,"L");
			

			$this->Cell(10,5,"19.",0,0,"R");
			$this->Cell(24,5,"Email :",0,0,"L");
			$this->Cell(73,5,$data->Profile[0]->EmailID,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$paym = "";
			$this->Cell(3,5,"20.",0,0,"C");
			$this->Cell(36,5,"Payment Details :  ",0,0,"L");
			$this->Cell(147,5,$paym,1,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(3,5,"21.",0,0,"C");
			$this->Cell(35,5,"Qualifications :  ",0,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(30,5,"Examination",1,0,"L");
			$this->Cell(73,5,"Board/University :  ",1,0,"L");
			$this->Cell(15,5,'Year',1,0,"C");
			$this->Cell(28,5,'Roll No.',1,0,"C");
			$this->Cell(20,5,'Max. Mrk.',1,0,"C");
			$this->Cell(20,5,'Obt. Mrk.',1,1,"C");

			$this->Cell(30,5,"High School",1,0,"L");
			$this->Cell(73,5,substr($data->Academics[0]->BoardName,0,40),1,0,"L");
			$this->Cell(15,5,$data->Academics[0]->PassYear,1,0,"C");
			$this->Cell(28,5,$data->Academics[0]->Roll_No,1,0,"C");
			$this->Cell(20,5,$data->Academics[0]->Max_Marks,1,0,"C");
			$this->Cell(20,5,$data->Academics[0]->Obt_Marks,1,1,"C");

			$this->Cell(30,5,"Intermediate",1,0,"L");
			$this->Cell(73,5,substr($data->Academics[1]->BoardName,0,40),1,0,"L");
			$this->Cell(15,5,$data->Academics[1]->PassYear,1,0,"C");
			$this->Cell(28,5,$data->Academics[1]->Roll_No,1,0,"C");
			$this->Cell(20,5,$data->Academics[1]->Max_Marks,1,0,"C");
			$this->Cell(20,5,$data->Academics[1]->Obt_Marks,1,1,"C");
			$this->Cell(0,1,'',0,1,"C");

			$this->Cell(25,5,"Subjects/Stream :   ",0,0,"C");
			$this->Cell(80,5,$data->Academics[1]->Stream,0,1,"L");
			$this->Cell(0,1,'',0,1,"C");

			    //declaration
			$this->SetFont('Arial','B',10);
			$this->SetX(90);
			$this->Cell(25,5,"Declaration ","B",1,"C");
			$this->Cell(0,5,'',0,1,"C");
			$this->SetFont('Arial','',10);
			$this->MultiCell(188,4,"I declare that I fullfill all the criteria for admission in the above mentioned course in the college. I know, incase any of my infromation is found to be false or incorrect, it which will lead to termination of my admission at any point of time during my course duration. \n",0,"J",false);

			$this->SetX(11);
			$this->Cell(70,7,"","B",0,"C");
			$this->Cell(45,7,"",0,0,"C");
			$this->Cell(70,7,"","B",1,"C");
			$this->SetFont('Arial','B',10);
			$this->Cell(70,7,"Signature of Parent/Guardian",0,0,"C");
			$this->Cell(45,7,"",0,0,"L");
			$this->Cell(70,7,"Signature of Candidate",0,1,"C");
			$this->Cell(70,7,"Date : __________________",0,0,"C");
			$this->Cell(45,7,"",0,0,"L");
			$this->Cell(70,7,"Date : __________________",0,1,"C");

			      //document checklist
			$this->SetX(85);
			$this->SetFont('Arial','B',11);
			$this->Cell(25,4,"Document Checklist (Office Use Only) ","B",1,"C");

			$this->SetFont('Arial','',9);

			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Xth Marksheet",1,0,"L");
			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Xth Certificate",1,1,"L");

			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"XIIth Marksheet",1,0,"L");
			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"CLC/SLC",1,1,"L");

			// $this->Cell(8,6,"",1,0,"L");
			// $this->Cell(85,6,"Recent Passport Sized Photograph",1,0,"L");
			// $this->Cell(8,6,"",1,0,"L");
			// $this->Cell(85,6,"Scanned Signature",1,1,"L");

			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Domicile",1,0,"L");
			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Migration Certificate",1,1,"L");

			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Certificate for Category",1,0,"L");
			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Certificate for Sub-Category",1,1,"L");

			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Documents for Claiming Weightage",1,0,"L");
			$this->Cell(8,6,"",1,0,"L");
			$this->Cell(85,6,"Other Certificate/Document",1,1,"L");

			$this->AddPage();
        	$this->steps = array(
            "Confirmation By College"=>"Admission has been granted to provisonally as said above.",
            "Waiting Time"=>"You should wait 24-48 hours after receving the admission letter.",
            "Check University Admission Status"=>"The College will send you name to the university. You can check it on : https://admission.ppuponline.in",
            "If Admission Not Found"=>"Contact the college immediately. The admission of students whose name does not appear on university website, is not confirmed.",
            
            "If Admission Status is Found"=>"Double Check you admission details, login on university website, and Pay the university registration fees.",
            
              "Registration Slip"=>"It shall be issued 10 days after whole university proccess, only if the college has submitted all you required documents to university.",
              
              
              "Updates"=>"Keep Visiting https://admission.ppup.ac.in and https://ppup.ac.in for latest updates.",
            
            
            
            );

            $this->SetFont('Arial','',20);
			// Move to the right
				    // Title
		    $this->SetY(3);
		    $this->Cell(0,8,$this->college['name'],0,1,'C');
		    $this->SetFont('Arial','',13);
		    $this->Cell(0,8,$this->college['address'],"B",1,'C');
		    $this->Rect(10,20,190,0);

		    $this->Ln(20);

		    $this->SetFont('','B',16);
		    $this->Cell(0,8,"Admission Letter",0,1,"C");

		    $this->SetFont('Arial','',11);
		    $this->Cell(0,6,"Date : ". $this->student['dateofadmission'],0,1,"L");

		    $this->Cell(0,5,"",0,1);

		    $this->SetFont('Arial','',9);
		    $this->MultiCell(190,5,"This is to confirm that the admission of Mr./Miss ". $this->student['name'] . " S/o / D/o of ". $this->student['father']. " Date of Birth : " . $this->student['dob'] . " has been provisonally accepted in " .$this->subjects['subject1']." - ". $this->allSubjects[$this->subjects['subject1']].".  Please be noted that admissions are subject to physical verification of original documents and submission of orginal Migration Certificate & CLC/SLC, failing which the admission and registration (if done) shall be cancelled. For such students, there is not refund of fees, either in the college or in the university. \n Please read the next steps carefully and follow the instructions. ",1,"L");
		    $this->Cell(0,9,"",0,1);
		    $this->Cell(0,9,"",0,1);

		    $this->SetFont('Arial','B',12);
		    $this->Cell(0,8,"Next Steps",1,1,"L");
		    $this->SetFont('Arial','B',8);
		    foreach ($this->steps as $key => $value){
		        $this->Cell(0,5,"$key","TLR",1,"L");
		        $this->Cell(0,5,"$value","BLR",1,"L");
		    };

		    $this->AddPage();

		      $particular = ["University Fund",
        "Admission Fee",
        "Tuition fee for the month of T.C/C.I.C. Fee",
        "Development Fee",
        "Miscellaneous Fee",
        "Building Fee",
        "Medical",
        "Library Fine",
        "Idty. Card","Library Fee",
        "College Exam. Fee",
        "Lab.C.M./Lib C.M.",
        "P.G.E",
        "Magazine Fee",
        "Extra Curricular activities Fee",
        "Student Aid Fee",
        "Student Union Fee",
        "N.C.C. Fee",
        "Common Room Fee",
        "House Rent Fee",
        "University Fee",
        "Marks Fee",
        "Local Levy",
        "Late Fine",
        "Cost of Remittance"];

    $this->SetY(2);
    $this->SetFont('Arial','B',15);
    $this->Cell(100,9,$this->college['name'],0,1,'C');
    $this->SetFont('Arial','B',11);
    $this->Cell(13,4,'',0,0,'C');

    $this->Cell(65,4,'Fee Collection Receipt',"",1,'C');
    $this->Cell(13,4,'',0,0,'C');
    $this->Cell(65,4,'Session : 2020-23',"",1,'C');

    $this->Cell(0,2,'',0,1,'C');
    $this->SetFont('Arial','B',10);
    $this->SetX(5);
    $this->Cell(12,5,'Sl No.:',0,0,'L');

    $this->Cell(20,5,$this->fees['slno'],0,0,'L');
    $this->Cell(20,5,'',0,0,'L');

    $this->Cell(10,5,'Date:',0,0,'C');
    $this->Cell(40,5,$this->fees['date'],0,1,'C');

    $this->Cell(0,2,'',0,1,'C');

    $this->SetX(5);
    $this->SetFont('Arial','',11);
    $this->Cell(30,5,'Name',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(0,5,$this->student['name'],0,1,'L');

    $this->SetX(5);
    $this->Cell(30,5,'Father\'s Name',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(0,5,$this->student['father'],0,1,'L');


    $this->SetX(5);
    $this->Cell(30,5,'Class',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(15,5,"Part-I",0,0,'L');

    $this->Cell(15,5,'Roll No',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(20,5,$this->student['roll'],0,1,'L');


    $this->SetX(5);
        $this->Cell(30,5,'Subject',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(0,5,$this->subjects['subject1']."-".$this->allSubjects[$this->subjects['subject1']],0,1,'L');    
    



    $this->SetFont('Arial','',12);
    $this->SetX(5);    
    $this->Cell(75,8,'PARTICULARS',1,0,'l');
    $this->SetFont('Arial','',9);
    $this->MultiCell(28,4,"Amount \n Rs.             P.",1,"C",false);
    $this->SetX(5); 
    $this->Cell(7,1,"","L",'R');
    $this->Cell(68,1,"","R,",'L');
    $this->Cell(20,1,'',"R",0,'C');
    $this->Cell(8,1,'',"R",1,'C');

$serialNo =1;
foreach ($particular as $key => $value) {
    # code...
    $this->SetFont('Arial','',10);
    $this->SetX(5); 
    $this->Cell(7,4.25,$serialNo,"L",'R');
    $this->Cell(68,4.25,$particular[$key],"R,",'L');
    $this->Cell(20,4.25,'',"R",0,'C');
    $this->Cell(8,4.255,'',"R",1,'C');
    $serialNo++;
}
    

    $this->SetFont('Arial','B',10);
    $this->SetX(5);    
    $this->Cell(75,6,'TOTAL',1,0,'C');
    $this->Cell(28,6,$this->fees['amount'],1,1,'C');

   $this->SetFont('Arial','B',10);

    $this->Cell(0,1,'',0,1,'C');
    $this->SetX(5);
    $this->Cell(5,5,'Rs.',0,0,'C');
    $this->Cell(0,5,$this->fees['amount'],0,1,'L');
    // $this->SetX(65);
    $this->SetFont('Arial','B',8);

    $this->Cell(0,5,'1. This is a generated reciept and does not require signature.',0,1,'L');
    $this->Cell(0,5,'2. Fees once generated shall not be refunded.',0,1,'L');

		    

    $this->AddPage();
    $this->SetleftMargin(0.001);
    $this->SetRightMargin(125);


    $this->SetFillColor(247,246,196);
    $this->Rect(0,0,85.6,53.98,"DF");

    $this->SetFillColor(247,246,196);
    // $this->Rect(1.2,1.2,82.4,50.88,"F");
    $this->SetFont('Times','B',10);
    // Move to the right
    // Title
    $path = "back/uploads/college/logo/".$this->college['code'].".jpg";
    if (file_exists($path)) {
        $this->Image($path,6,1.2,8);
    }
    

    $this->SetY(3);
    $this->SetTextColor(128,0,0);
//   College---------------
     $this->Cell(0,1,$this->college['name'],0,1,'C');
     $this->Cell(0,1,'',0,1,'C');

     $this->SetFont('Times','',7);
//   College Address-----------
     $this->Cell(0,6,$this->college['address'],0,1,'C');

    $this->SetFillColor(16,178,151);
    $this->SetTextColor(255,255,255);
//   Session-----------------
    $this->SetFont('Times','B',8);
    $this->Cell(0,4,'SESSION : 2020-23',0,1,'C',True);
    $this->SetFont('Times','',7);
//   Photo -----------------

    if (file_exists("back/uploads/images/photos/".$applicationNo.".jpg")) {
    	$this->Image('back/uploads/images/photos/'.$this->student['appid'].'.jpg',4,22,25);
    }

    

    $this->Cell(6);
     $this->SetFont('Times','B',7);
    $this->SetTextColor(0,0,0);
     $this->Cell(0,1,'',0,1,'C');

     $this->Cell(7);
     $this->Cell(10,4,'Roll No :',0,0,'L');
     $this->SetFont('Times','B',9);
     $this->Cell(10,4,$this->student['roll'],0,0,'L');
     $this->SetFont('Times','',10);
//   Roll Number-----------------
    $this->Cell(4,4,'',0,0,'L');
 
     $this->SetFont('Times','B',6);
    $this->Cell(12,4,'Subject :',0,0,'L');
    $this->Cell(16,4,$this->subjects['subject1']."-".$this->allSubjects[$this->subjects['subject1']],0,0,'L');
     $this->SetFont('Times','',8);
//   Subject----------------------
    $this->Cell(14,4,'',0,1,'L');

    $this->Cell(31);
    $this->SetFont('Times','B',7);


    
//   Name------------------------

    $this->Cell(16,4,"Name ",0,0,'L');
    $this->Cell(2,4,":",0,0,'L');
    $this->Cell(33,4,$this->student['name'],0,1,'L');


//   Father---------------------
    $this->Cell(31);

    $this->Cell(16,4,"Father's Name ",0,0,'L');
    $this->Cell(2,4,":",0,0,'L');
    $this->Cell(33,4,$this->student['father'],0,1,'L');
   

    
    
//   Date Of Birth--------------
  
     $dob = $this->student['dob'];

    $this->Cell(31);

    $this->Cell(16,4,"DOB ",0,0,'L');
    $this->Cell(2,4,":",0,0,'L');
    $this->Cell(33,4,$dob,0,1,'L');
   

    $this->Cell(31);
    $this->SetFont('Times','B',6);

    $this->Cell(16,4,"Address ",0,0,'L');
    $this->Cell(2,4,":",0,0,'L');
    $this->MultiCell(33,4,$this->student['address'],0,"L");
    // $this->vcell(33,4,$this->getX(),$this->student['address']);

   
    $this->Cell(0,2,'',0,1,'C');
    $this->Cell(0,2,'',0,1,'C');
    $this->Cell(62.5);
//   Principal Sign---------------
    // $this->Cell(14);
    $path = "back/uploads/college/logo/".$this->college['code'].".jpg";
    // if (file_exists($path)) {
    //     $this->Image($path,$this->getX(),$this->getY(),14,5);
    // }


    $this->SetFont('Times','BI',5);
    $this->Text(62.5,53,"Principal's Sign");


	}
}
