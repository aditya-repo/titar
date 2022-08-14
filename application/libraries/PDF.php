<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';

class Admission_Form extends FPDF {
global $appointment,$data,$applicationNo;
$this->SetFont('Arial','B',14);
// Move to the right
// Title
$this->SetY(4);
$this->Cell(0,7,'Patliputra University,Patna',0,1,'C');
$this->SetFont('Arial','B',11);
$this->Cell(0,5,'Under-Graduate (UG) Admission Application Form',0,1,'C');
$this->SetFont('Arial','B',9);
$this->Cell(0,5,'SESSION 2020-2022',0,1,'C');
$this->SetFont('Arial','',10);

$this->Ln(15);

   //passport photo & signature
$this->SetY(26);
$this->Cell(155);
if (file_exists("uploads/images/photos/".$applicationNo.".jpg")) {
$this->Image("uploads/images/photos/".$applicationNo.".jpg",164,24,34,0);
}
//$this->Cell(30,33,'',1,0,"C");

$this->SetY(60);
$this->Cell(155);
if (file_exists("uploads/images/sign/".$applicationNo.".jpg")) {

$this->Image("uploads/images/sign/".$applicationNo.".jpg",164,99,32,10);}
//$this->Cell(30,11,'',1,0,"C");

$this->SetY(70);
$this->Cell(155);
$this->Cell(30,9,'signature',0,0,"C");

   //candidate details
$this->SetY(18);
$this->SetFont('Arial','',9);
$this->Cell(0,8,'UAN # '. $data->Profile[0]->SLogin,0,0,"L");
$this->Cell(-32,8,'',0,1,"R");
$this->Cell(0,0,'',0,1,"C");
$this->SetFont('Arial','B',9);

$this->Cell(3,6,"1.",0,0,"C");
$this->Cell(31,6,'Candidate Name :  ',0,0,"L");
$this->Cell(120,5,$data->Profile[0]->CandidateName,1,1,"l");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"2.",0,0,"C");
$this->Cell(31,6,"Father's Name :  ",0,0,"L");
$this->Cell(120,5,$data->Profile[0]->FatherName,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"3.",0,0,"C");
$this->Cell(31,6,"Mother's Name :  ",0,0,"L");
$this->Cell(120,5,$data->Profile[0]->MotherName,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"4.",0,0,"C");
$this->Cell(31,6,"Date of Birth :  ",0,0,"L");
$this->Cell(48,5,$data->Profile[0]->BirthDate,1,0,"L");

$this->Cell(10,6,"5.",0,0,"R");
$this->Cell(24,6,"Gender :",0,0,"L");
$this->Cell(38,5,$data->Profile[0]->GenderName,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"6.",0,0,"C");
$this->Cell(31,6,"Category :  ",0,0,"L");
$this->Cell(48,5,$data->Profile[0]->VReservation,1,0,"L");

$this->Cell(10,6,"7.",0,0,"R");
$this->Cell(24,6,"Sub Category :",0,0,"L");
$this->Cell(38,5,$data->Profile[0]->HReservation,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"8.",0,0,"C");
$this->Cell(31,6,"Other Category :  ",0,0,"L");
$this->Cell(48,5,$data->Profile[0]->CategoryName,1,0,"L");

$this->Cell(10,6,"9.",0,0,"R");
$this->Cell(24,6,"AADHAAR :",0,0,"L");
$this->Cell(38,5,$data->Profile[0]->UID_AADHAARNo,1,1,"Ellipse.php");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"10.",0,0,"C");
$this->Cell(31,6,"Domicile :  ",0,0,"L");
$this->Cell(48,5,$data->Profile[0]->DomicileStateName,1,0,"L");
$this->Cell(10,6,"11.",0,0,"R");
$this->Cell(24,6,"Dom. Cert. :",0,0,"L");
$this->Cell(38,5,$data->Profile[0]->DomicileCertificateNo,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"12.",0,0,"C");
$this->Cell(31,6,"Religion :  ",0,0,"L");
$this->Cell(48,5,$data->Profile[0]->Religion,1,0,"L");
$this->Cell(10,6,"13.",0,0,"R");
$this->Cell(24,6,"Minority :",0,0,"L");
$this->Cell(38,5,$data->Profile[0]->IsMinority,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"14.",0,0,"C");
$this->Cell(31,6,"Nationality :  ",0,0,"L");
$this->Cell(48,5,$data->Profile[0]->Nationality,1,0,"L");
$this->Cell(10,6,"15.",0,0,"R");
$this->Cell(24,6,"EWS status :",0,0,"L");
$this->Cell(38,5,'',1,1,"C");
$this->Cell(0,1,'',0,1,"C");

   //correspondance address
$corr = $data->Profile[0]->CAddress."\n".$data->Profile[0]->CDistrict."\n".$data->Profile[0]->CPinCode;
$this->Cell(90,6,'16.Address for Correspondance :-',"L,R,T",1,"L");
$this->Cell(15,6,'',0,0,"C");
$this->Cell(-15);
$this->MultiCell(90,5,$corr,"L,R,B","L",false);
$this->Cell(18,5,'',0,0,"C");
$this->ln(-15);
$this->cell(10);
$this->ln(15);

   //permanent address
$this->ln(-21);
$this->Cell(96);
$perm = $data->Profile[0]->PAddress."\n".$data->Profile[0]->PDistrict."\n".$data->Profile[0]->PPinCode;
$this->Cell(90,6,'17.Permanent address :-',"L,R,T",1,"L");
$this->Cell(15,6,'',0,0,"C");
$this->Cell(81);
$this->MultiCell(90,5,$perm,"L,R,B","L",false);
$this->Cell(18,5,'',0,0,"C");
$this->ln(-15);
$this->cell(10);

$this->ln(15);

$this->Cell(0,1,'',0,1,"C");
$this->Cell(4,6,"18.",0,0,"C");
$this->Cell(23,6,"Mobile :  ",0,0,"L");
$this->Cell(55,5,$data->Profile[0]->MobileNo,1,0,"L");
$this->Cell(10,6,"19.",0,0,"R");
$this->Cell(24,6,"Email :",0,0,"L");
$this->Cell(70,5,$data->Profile[0]->EmailID,1,1,"L");
$this->Cell(0,2,'',0,1,"C");

$paym = "";
$this->Cell(3,6,"20.",0,0,"C");
$this->Cell(36,6,"Payment Details :  ",0,0,"L");
$this->Cell(147,6,$paym,1,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(3,6,"21.",0,0,"C");
$this->Cell(36,6,"Qualifications :  ",0,1,"L");
$this->Cell(0,1,'',0,1,"C");

$this->Cell(30,6,"Examination",1,0,"L");
$this->Cell(73,6,"Board/University :  ",1,0,"L");
$this->Cell(15,6,'Year',1,0,"C");
$this->Cell(28,6,'Roll No.',1,0,"C");
$this->Cell(20,6,'Max. Mrk.',1,0,"C");
$this->Cell(20,6,'Obt. Mrk.',1,1,"C");

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

$this->Cell(25,6,"Subjects/Stream :   ",0,0,"C");
$this->Cell(80,6,$data->Academics[1]->Stream,0,1,"L");
$this->Cell(0,1,'',0,1,"C");

    //declaration
$this->SetFont('Arial','B',10);
$this->SetX(90);
$this->Cell(25,6,"Declaration ","B",1,"C");
$this->Cell(0,5,'',0,1,"C");
$this->SetFont('Arial','',10);
$this->MultiCell(188,4,"I declare that I have never been convicted for any criminal act and that there is no case pending against me in the court of law. I also declare that I have never been caught using Unfair Means or any Disciplinary action has been taken against me. If I was charged for using Unfair Means, the punitive duration is over and charges have been cleared. I have read carefully and have understood all rules as mentioned in the University Rules and Admission Brochure. Furthermore I also declare that if my application is found to contain incorrect/false information regarding my Name, Birth Date, Gender, Religion, Domicile, Weightage, Caste, Horizontal Reservation, Marks obtained or any other field, my application is liable to get cancelled, and I will have no objection in getting disqualified for admission to the concerned course/college. \n",0,"J",false);

$this->SetX(11);
$this->Cell(70,10,"","B",0,"C");
$this->Cell(45,10,"",0,0,"C");
$this->Cell(70,10,"","B",1,"C");
$this->SetFont('Arial','B',10);
$this->Cell(70,7,"Signature of parent/Guardian",0,0,"C");
$this->Cell(45,7,"",0,0,"L");
$this->Cell(70,7,"Signature of Candidate",0,1,"C");
$this->Cell(70,7,"Date : __________________",0,0,"C");
$this->Cell(45,7,"",0,0,"L");
$this->Cell(70,7,"Date : __________________",0,1,"C");
$this->Cell(0,3,'',0,1,"C");
$this->Cell(70,6,"Options checked during Application",0,1,"L");
$this->Cell(0,6,">>",0,1,"L");

      //document checklist
$this->SetX(85);
$this->SetFont('Arial','B',11);
$this->Cell(37,4,"Document Checklist ","B",1,"C");

$this->SetFont('Arial','',9);
$this->Cell(0,6,"Note: Mark the number of documents(Photocopy/ Xerox) attached by the candidate during form submission to the college",0,1,"L");
$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Xth Marksheet",1,0,"L");
$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Xth Certificate",1,1,"L");

$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"XIIth Marksheet",1,0,"L");
$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Last Exam Passed Markheet",1,1,"L");

$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Recent Passport Sized Photograph",1,0,"L");
$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Scanned Signature",1,1,"L");

$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Domicile(for other state)",1,0,"L");
$this->Cell(8,6,"",1,0,"L");
$this->Cell(85,6,"Certificate for Kashmiri Resident",1,1,"L");

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
// $value="uploads/images/photos/1111.jpg";
// foreach ($directoryName as $key => $value){
//     $value= "uploads/images/".$value."/".$applicationNo.".jpg";
    
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
