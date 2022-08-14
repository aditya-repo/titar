<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';



class Admission_Form extends FPDF {

	function getData($application,$realApplication){

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
			$this->content($data,$realApplication);

			// var_dump($data);
			}

			


		function content($data,$applicationNo) {
			$this->SetFont('Arial','B',14);
			// Move to the right
			// Title
			$this->SetY(4);
			$this->Cell(0,7,'Patliputra University,Patna',0,1,'C');
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

			// $directoryName = array('10th Marksheet'=>'marksheet1','12th Marksheet'=>'marksheet2','Category'=>'category','EWS'=>'ews','Migration'=>'migration' );
			// global $applicationNo;
			// $value="back/uploads/images/photos/1111.jpg";
			// foreach ($directoryName as $key => $value){
			//     $value= "back/uploads/images/".$value."/".$applicationNo.".jpg";
			    
			//         if (file_exists($value) == true) {
			//             if (filesize($value) > 200){
			//             $this->AddPage();
			//             list($width, $height) = getimagesize($value);
			//             $this->image($value,15,15,183,0);
			//         }
			//     }
			// }


		}
}
