<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';



class Idcard extends FPDF {

	function getData($a,$b,$c){

		$this->college =  $a;
        $this->student = $b;
		$this->subject = $c;

		$this->content();
	}

	function vcell($c_width,$c_height,$x_axis,$text){
					$w_w=$c_height/3;
					$w_w_1=$w_w+2;
					$w_w1=$w_w+$w_w+$w_w+3;
					$len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array 

					$lengthToSplit = 30;
					if($len>$lengthToSplit){
					   $w_text=str_split($text,$lengthToSplit);
					   foreach ($w_text as $text) {
						    $this->SetX($x_axis);
						    $this->Cell($c_width,3,$text,'',1,'J');
						       
						    }
					    }
					}



		function content() {
    $this->SetleftMargin(0.001);
    $this->SetRightMargin(0.001);


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
    $this->Image('back/uploads/images/photos/'.$this->student['appid'].'.jpg',4,22,25);

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
    $this->Cell(16,4,$this->student['subject']."-".$this->subject[$this->student['subject']],0,0,'L');
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
    $this->MultiCell(33,3,$this->student['address'],0,"L");
    // $this->vcell(33,4,$this->getX(),$this->student['address']);

   
    $this->Cell(0,2,'',0,1,'C');
    $this->Cell(0,2,'',0,1,'C');
    $this->Cell(62.5);
//   Principal Sign---------------
    // $this->Cell(14);
    $path = "back/uploads/college/logo/".$this->college['code'].".jpg";
    if (file_exists($path)) {
        $this->Image($path,$this->getX(),$this->getY(),14,5);
    }


    $this->SetFont('Times','BI',5);
    $this->Text(62.5,53,"Principal's Sign");

}

		
}
