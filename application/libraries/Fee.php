<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf-1.7.php';



class Fee extends FPDF {

	function getData($a,$b,$c,$d){

        $this->college = $a;
		$this->payment = $c;
        $this->student = $b;
		$this->subject = $d;
		$this->content();
	}

function towords($number){
    $words = Array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
    $digits = Array('', '', 'Hundred', 'Thousand', 'Lakh', 'Crore');

    $number = explode(".", $number);
    $result = array("","");
    $j =0;
    foreach($number as $val){
        // loop each part of number, right and left of dot
        for($i=0;$i<strlen($val);$i++){
            // look at each part of the number separately  [1] [5] [4] [2]  and  [5] [8]

            $numberpart = str_pad($val[$i], strlen($val)-$i, "0", STR_PAD_RIGHT); // make 1 => 1000, 5 => 500, 4 => 40 etc.
            if($numberpart <= 20){ // if it's below 20 the number should be one word
                $numberpart = 1*substr($val, $i,2); // use two digits as the word
                $i++; // increment i since we used two digits
                $result[$j] .= $words[$numberpart]." ";
            }else{
                //echo $numberpart . "<br>\n"; //debug
                if($numberpart > 90){  // more than 90 and it needs a $digit.
                    $result[$j] .= $words[$val[$i]] . " " . $digits[strlen($numberpart)-1] . " "; 
                }else if($numberpart != 0){ // don't print zero
                    $result[$j] .= $words[str_pad($val[$i], strlen($val)-$i, "0", STR_PAD_RIGHT)] ." ";
                }
            }
        }
        $j++;
    }
    $string = "";
    if(trim($result[0]) != "") $string .= $result[0] . "Rupees ";
    if($result[1] != "") $string .= $result[1] . "Paise";
    $string .= " Only";
    return $string;
}



	function content() {

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
    $this->Cell(0,9,$this->college['name'],0,1,'C');
    $this->SetFont('Arial','B',11);
    $this->Cell(13,4,'',0,0,'C');

    $this->Cell(65,4,'Fee Collection Receipt',"",1,'C');
    $this->Cell(13,4,'',0,0,'C');
    $this->Cell(65,4,'Session : 2020-23',"",1,'C');

    $this->Cell(0,2,'',0,1,'C');
    $this->SetFont('Arial','B',10);
    $this->SetX(5);
    $this->Cell(12,5,'Sl No.:',0,0,'L');

    $this->Cell(20,5,$this->student['serialNo'],0,0,'L');
    $this->Cell(20,5,'',0,0,'L');

    $this->Cell(10,5,'Date:',0,0,'C');
    $this->Cell(40,5,$this->student['date'],0,1,'C');

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
    $this->Cell(15,5,$this->student['class'],0,0,'L');

    $this->Cell(15,5,'Roll No',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(20,5,$this->student['roll'],0,1,'L');


    $this->SetX(5);
        $this->Cell(30,5,'Subject',0,0,'L');
    $this->Cell(3,5,':',0,0,'L');
    $this->Cell(0,5,$this->student['subject']."-".$this->subject[$this->student['subject']],0,1,'L');    
    



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
    $this->Cell(28,6,$this->payment['amount'],1,1,'C');

   $this->SetFont('Arial','B',10);

    $this->Cell(0,1,'',0,1,'C');
    $this->SetX(5);
    $this->Cell(5,5,'Rs.',0,0,'C');
    $this->Cell(0,5,$this->payment['amount'],0,1,'L');
    // $this->SetX(65);
    $this->SetFont('Arial','B',8);

    $this->Cell(0,5,'1. This is a generated reciept and does not require signature.',0,1,'L');
    $this->Cell(0,5,'2. Fees once generated shall not be refunded.',0,1,'L');





}

		
}
