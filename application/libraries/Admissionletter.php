<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';



class Admissionletter extends FPDF {

    function getData($a,$b,$c){

        $this->college =  $a;
        $this->student = $b;
        $this->subject = $c;
        $this->steps = array(
            "Confirmation By College"=>"Admission has been granted to provisonally as said above.",
            "Waiting Time"=>"You should wait 24-48 hours after receving the admission letter.",
            "Check University Admission Status"=>"The College will send you name to the university. You can check it on : https://admission.ppuponline.in",
            "If Admission Not Found"=>"Contact the college immediately. The admission of students whose name does not appear on university website, is not confirmed.",
            
            "If Admission Status is Found"=>"Double Check you admission details, login on university website, and Pay the university registration fees.",
            
              "Registration Slip"=>"It shall be issued 10 days after whole university proccess, only if the college has submitted all you required documents to university.",
              
              
              "Updates"=>"Keep Visiting https://admission.ppup.ac.in and https://ppup.ac.in for latest updates.",
            
            
            
            );
        $this->content();
        
    }


function content() {
   // var_dump($this->college);
   // var_dump($this->student);
   // var_dump($this->subject);
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
   $this->MultiCell(190,5,"This is to confirm that the admission of Mr./Miss ". $this->student['name'] . "S/o / D/o of ". $this->student['father']. " Date of Birth : " . $this->student['dob'] . " has been provisonally accepted in " .$this->student['subject']." - ". $this->subject[$this->student['subject']].".  Please be noted that admissions are subject to physical verification of original documents and submission of orginal Migration Certificate & CLC/SLC, failing which the admission and registration (if done) shall be cancelled. For such students, there is not refund of fees, either in the college or in the university. \n Please read the next steps carefully and follow the instructions. ",1,"L");
    $this->Cell(0,9,"",0,1);

    // $this->MultiCell(190,5,"One day, according to an old story, a man with a serious illness was wheeled into a hospital room where another patient was resting on a bed next to the window. As the two became friends, the one next to the window would look out of it and then spend the next few hours delighting his bedridden companion with vivid descriptions of the world outside. Some days he would describe the beauty of the trees in the park across from the hospital and how the leaves danced in the wind. On other days, he would entertain his friend with step - by – step replays of the things people were doing as they walked by the hospital. However, as time went on, the bedridden man grew frustrated at his inability to observe the wonders his friend described. Eventually he grew to dislike him and then to hate him intensely.",1,"L");

    $this->Cell(0,9,"",0,1);

    $this->SetFont('Arial','B',12);
    $this->Cell(0,8,"Next Steps",1,1,"L");
    $this->SetFont('Arial','B',8);
    foreach ($this->steps as $key => $value){
        $this->Cell(0,5,"$key","TLR",1,"L");
        $this->Cell(0,5,"$value","BLR",1,"L");
    };
    




    }
        
}
