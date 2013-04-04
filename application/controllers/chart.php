<?php

class Chart_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public $restful = true;
	public $controller = 'chart';

	public $crumb;

	public function __construct(){
		$this->crumb = new Breadcrumb();

		$this->filter('before','auth');
	}

	

	public function get_projecttimeline(){

		/* Create and populate the pData object */

		// count project first
				
		$value1 = $this->valueproject(1,'inprogress');
		$value2 = $this->valueproject(2,'inprogress');
		$value3 = $this->valueproject(3,'inprogress');
		$value4 = $this->valueproject(4,'inprogress');
		$value5 = $this->valueproject(5,'inprogress');
		$value6 = $this->valueproject(6,'inprogress');
		$value7 = $this->valueproject(7,'inprogress');
		$value8 = $this->valueproject(8,'inprogress');
		$value9 = $this->valueproject(9,'inprogress');
		$value10 = $this->valueproject(10,'inprogress');
		$value11 = $this->valueproject(11,'inprogress');
		$value12 = $this->valueproject(12,'inprogress');

		$value_comp1 = $this->valueproject(1,'completed');
		$value_comp2 = $this->valueproject(2,'completed');
		$value_comp3 = $this->valueproject(3,'completed');
		$value_comp4 = $this->valueproject(4,'completed');
		$value_comp5 = $this->valueproject(5,'completed');
		$value_comp6 = $this->valueproject(6,'completed');
		$value_comp7 = $this->valueproject(7,'completed');
		$value_comp8 = $this->valueproject(8,'completed');
		$value_comp9 = $this->valueproject(9,'completed');
		$value_comp10 = $this->valueproject(10,'completed');
		$value_comp11 = $this->valueproject(11,'completed');
		$value_comp12 = $this->valueproject(12,'completed');

		//$data = $projects->find()
		$MyData = new pData();   
		$MyData->addPoints(array($value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10,$value11,$value12),"In Progress"); 
		$MyData->addPoints(array($value_comp1,$value_comp2,$value_comp3,$value_comp4,$value_comp5,$value_comp6,$value_comp7,$value_comp8,$value_comp9,$value_comp10,$value_comp11,$value_comp12),"Completed"); 
		$MyData->setAxisName(0,"USD Equivalent Value"); 
		$MyData->addPoints(array("January","February","March","April","May","Juny","July","August","September","Oktober","November","Desember"),"Months"); 
		$MyData->setSerieDescription("Months","Month"); 
		$MyData->setAbscissa("Months"); 

		/* Create the pChart object */ 
		$myPicture = new pImage(800,230,$MyData); 

		/* Turn of Antialiasing */ 
		$myPicture->Antialias = FALSE; 

		/* Add a border to the picture */ 
		$myPicture->drawGradientArea(0,0,800,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100)); 
		$myPicture->drawGradientArea(0,0,800,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20)); 
		$myPicture->drawRectangle(0,0,799,229,array("R"=>0,"G"=>0,"B"=>0)); 

		/* Set the default font */ 
		/* Choose a nice font */
	    $myPicture->setFontProperties(array("FontName"=>path('app')."libraries/pchart/fonts/pf_arma_five.ttf","FontSize"=>6));
		 

		 /* Define the chart area */ 
		 $myPicture->setGraphArea(60,40,780,200); 

		 /* Draw the scale */ 
		 $scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE); 
		 $myPicture->drawScale($scaleSettings); 

		 /* Write the chart legend */ 
		 $myPicture->drawLegend(600,18,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 

		 /* Turn on shadow computing */  
		 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

		 /* Draw the chart */ 
		 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
		 $settings = array("Surrounding"=>-30,"InnerSurrounding"=>30,"Interleave"=>0); 
		 $myPicture->drawBarChart($settings); 

		 /* Render the picture (choose the best way) */ 
		 $myPicture->autoOutput("pictures/example.drawBarChart.spacing.png"); 
	    
	    
	}

	public function get_tendertimeline(){

		/* Create and populate the pData object */

		// count project first
				
		$value1 = $this->valuetender(1,'inprogress');
		$value2 = $this->valuetender(2,'inprogress');
		$value3 = $this->valuetender(3,'inprogress');
		$value4 = $this->valuetender(4,'inprogress');
		$value5 = $this->valuetender(5,'inprogress');
		$value6 = $this->valuetender(6,'inprogress');
		$value7 = $this->valuetender(7,'inprogress');
		$value8 = $this->valuetender(8,'inprogress');
		$value9 = $this->valuetender(9,'inprogress');
		$value10 = $this->valuetender(10,'inprogress');
		$value11 = $this->valuetender(11,'inprogress');
		$value12 = $this->valuetender(12,'inprogress');

		$value_comp1 = $this->valuetender(1,'won');
		$value_comp2 = $this->valuetender(2,'won');
		$value_comp3 = $this->valuetender(3,'won');
		$value_comp4 = $this->valuetender(4,'won');
		$value_comp5 = $this->valuetender(5,'won');
		$value_comp6 = $this->valuetender(6,'won');
		$value_comp7 = $this->valuetender(7,'won');
		$value_comp8 = $this->valuetender(8,'won');
		$value_comp9 = $this->valuetender(9,'won');
		$value_comp10 = $this->valuetender(10,'won');
		$value_comp11 = $this->valuetender(11,'won');
		$value_comp12 = $this->valuetender(12,'won');


		$value_loss1 = $this->valuetender(1,'loss');
		$value_loss2 = $this->valuetender(2,'loss');
		$value_loss3 = $this->valuetender(3,'loss');
		$value_loss4 = $this->valuetender(4,'loss');
		$value_loss5 = $this->valuetender(5,'loss');
		$value_loss6 = $this->valuetender(6,'loss');
		$value_loss7 = $this->valuetender(7,'loss');
		$value_loss8 = $this->valuetender(8,'loss');
		$value_loss9 = $this->valuetender(9,'loss');
		$value_loss10 = $this->valuetender(10,'loss');
		$value_loss11 = $this->valuetender(11,'loss');
		$value_loss12 = $this->valuetender(12,'loss');

		//$data = $projects->find()
		$MyData = new pData();   
		$MyData->addPoints(array($value1,$value2,$value3,$value4,$value5,$value6,$value7,$value8,$value9,$value10,$value11,$value12),"In Progress"); 
		$MyData->addPoints(array($value_comp1,$value_comp2,$value_comp3,$value_comp4,$value_comp5,$value_comp6,$value_comp7,$value_comp8,$value_comp9,$value_comp10,$value_comp11,$value_comp12),"Completed"); 
		$MyData->addPoints(array($value_loss1,$value_loss2,$value_loss3,$value_loss4,$value_loss5,$value_loss6,$value_loss7,$value_loss8,$value_loss9,$value_loss10,$value_loss11,$value_loss12),"Loss"); 
		$MyData->setAxisName(0,"USD Equivalent Value"); 
		$MyData->addPoints(array("January","February","March","April","May","Juny","July","August","September","Oktober","November","Desember"),"Months"); 
		$MyData->setSerieDescription("Months","Month"); 
		$MyData->setAbscissa("Months"); 

		/* Create the pChart object */ 
		$myPicture = new pImage(800,230,$MyData); 

		/* Turn of Antialiasing */ 
		$myPicture->Antialias = FALSE; 

		/* Add a border to the picture */ 
		$myPicture->drawGradientArea(0,0,800,230,DIRECTION_VERTICAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>100)); 
		$myPicture->drawGradientArea(0,0,800,230,DIRECTION_HORIZONTAL,array("StartR"=>240,"StartG"=>240,"StartB"=>240,"EndR"=>180,"EndG"=>180,"EndB"=>180,"Alpha"=>20)); 
		$myPicture->drawRectangle(0,0,799,229,array("R"=>0,"G"=>0,"B"=>0)); 

		/* Set the default font */ 
		/* Choose a nice font */
	    $myPicture->setFontProperties(array("FontName"=>path('app')."libraries/pchart/fonts/pf_arma_five.ttf","FontSize"=>6));
		 

		 /* Define the chart area */ 
		 $myPicture->setGraphArea(60,40,780,200); 

		 /* Draw the scale */ 
		 $scaleSettings = array("GridR"=>200,"GridG"=>200,"GridB"=>200,"DrawSubTicks"=>TRUE,"CycleBackground"=>TRUE); 
		 $myPicture->drawScale($scaleSettings); 

		 /* Write the chart legend */ 
		 $myPicture->drawLegend(600,18,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL)); 

		 /* Turn on shadow computing */  
		 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

		 /* Draw the chart */ 
		 $myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 
		 $settings = array("Surrounding"=>-30,"InnerSurrounding"=>30,"Interleave"=>0); 
		 $myPicture->drawBarChart($settings); 

		 /* Render the picture (choose the best way) */ 
		 $myPicture->autoOutput("pictures/example.drawBarChart.spacing.png"); 
	    
	    
	}


	public function get_projectpie(){

		$totaldata1 = $this->totalproject(1,'inprogress');
		$totaldata2 = $this->totalproject(2,'inprogress');
		$totaldata3 = $this->totalproject(3,'inprogress');
		$totaldata4 = $this->totalproject(4,'inprogress');
		$totaldata5 = $this->totalproject(5,'inprogress');
		$totaldata6 = $this->totalproject(6,'inprogress');
		$totaldata7 = $this->totalproject(7,'inprogress');
		$totaldata8 = $this->totalproject(8,'inprogress');
		$totaldata9 = $this->totalproject(9,'inprogress');
		$totaldata10 = $this->totalproject(10,'inprogress');
		$totaldata11 = $this->totalproject(11,'inprogress');
		$totaldata12 = $this->totalproject(12,'inprogress');

		if($totaldata1==0){
			$totaldata1= 1;
		}else{
			$totaldata1 =$totaldata1;
		}

		if($totaldata2==0){
			$totaldata2= 1;
		}else{
			$totaldata2 =$totaldata1;
		}

		if($totaldata3==0){
			$totaldata3= 1;
		}else{
			$totaldata3 =$totaldata1;
		}

		if($totaldata4==0){
			$totaldata4= 1;
		}else{
			$totaldata4 =$totaldata4;
		}
		if($totaldata5==0){
			$totaldata5= 1;
		}else{
			$totaldata5 =$totaldata5;
		}
		if($totaldata6==0){
			$totaldata6= 1;
		}else{
			$totaldata6 =$totaldata6;
		}
		if($totaldata7==0){
			$totaldata7= 1;
		}else{
			$totaldata7 =$totaldata7;
		}

		if($totaldata8==0){
			$totaldata8= 1;
		}else{
			$totaldata8 =$totaldata8;
		}

		if($totaldata9==0){
			$totaldata9= 1;
		}else{
			$totaldata9 =$totaldata9;
		}

		if($totaldata10==0){
			$totaldata10= 1;
		}else{
			$totaldata10 =$totaldata10;
		}

		if($totaldata11==0){
			$totaldata11= 1;
		}else{
			$totaldata11 =$totaldata11;
		}

		if($totaldata12==0){
			$totaldata12= 1;
		}else{
			$totaldata12 =$totaldata12;
		}



		/* Create and populate the pData object */ 
		 $MyData = new pData();    
		 $MyData->addPoints(array($totaldata1,$totaldata2,$totaldata3,$totaldata4,$totaldata5,$totaldata6,$totaldata7,$totaldata8,$totaldata9,$totaldata10,$totaldata11,$totaldata12),"ScoreA");   
		 $MyData->setSerieDescription("ScoreA","Application A"); 

		 /* Define the absissa serie */ 
		 $MyData->addPoints(array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Okt","Nov","Des"),"Labels"); 
		 $MyData->setAbscissa("Labels"); 

		 /* Create the pChart object */ 
		 $myPicture = new pImage(240,180,$MyData,TRUE); 

		 /* Set the default font properties */  
		 $myPicture->setFontProperties(array("FontName"=>"../fonts/Forgotte.ttf","FontSize"=>6,"R"=>80,"G"=>80,"B"=>80)); 

		 /* Create the pPie object */  
		 $PieChart = new pPie($myPicture,$MyData); 

		 /* Enable shadow computing */  
		 $myPicture->setShadow(TRUE,array("X"=>3,"Y"=>3,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10)); 

		 /* Draw a splitted pie chart */  
		 $PieChart->draw3DPie(140,90,array("Radius"=>100,"DataGapAngle"=>12,"DataGapRadius"=>10,"Border"=>TRUE)); 

		 /* Write the legend box */  
		 $myPicture->setFontProperties(array("FontName"=>path('app')."libraries/pchart/fonts/Silkscreen.ttf","FontSize"=>6,"R"=>0,"G"=>0,"B"=>0));

		 $PieChart->drawPieLegend(0,0,array("Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_VERTICAL)); 

		 /* Render the picture (choose the best way) */ 
		 $myPicture->autoOutput("pictures/example.draw3DPie.transparent.png"); 
	}

	public function get_projectdisplay(){

		return View::make('testgraph'); 
	}

	

	public function valueproject($month=0,$status){
		
		$projects = new Project();
		

		$datefrom = '01-0'.$month.'-2013';
		$dateto = '31-0'.$month.'-2013';
		$dateFrom = new MongoDate(strtotime($datefrom." 00:00:00"));
		$dateTo = new MongoDate(strtotime($dateto." 23:59:59"));

		$dataresult = $projects->find(array('createdDate'=>array('$gte'=>$dateFrom,'$lte'=>$dateTo),'projectStatus'=>$status));
		$dataresultvalue =0;
		foreach ($dataresult as $key => $value) {
			$dataresultvalue += $value['equivalentContractPriceUSD'];
		}

		return $dataresultvalue;
	}


	public function totalproject($month=0,$status){
		
		$projects = new Project();
		

		$datefrom = '01-0'.$month.'-2013';
		$dateto = '31-0'.$month.'-2013';
		$dateFrom = new MongoDate(strtotime($datefrom." 00:00:00"));
		$dateTo = new MongoDate(strtotime($dateto." 23:59:59"));

		$totalcount = $projects->count(array('createdDate'=>array('$gte'=>$dateFrom,'$lte'=>$dateTo),'projectStatus'=>$status));
	
		return $totalcount;
	}




	public function valuetender($month=0,$status){
		
		$projects = new Tender();
		

		$datefrom = '01-0'.$month.'-2013';
		$dateto = '31-0'.$month.'-2013';
		$dateFrom = new MongoDate(strtotime($datefrom." 00:00:00"));
		$dateTo = new MongoDate(strtotime($dateto." 23:59:59"));

		$dataresult = $projects->find(array('createdDate'=>array('$gte'=>$dateFrom,'$lte'=>$dateTo),'tenderStatus'=>$status));
		$dataresultvalue =0;
		foreach ($dataresult as $key => $value) {
			$dataresultvalue += $value['equivalentBidPriceUSD'];
		}

		return $dataresultvalue;
	}


	public function totaltender($month=0,$status){
		
		$projects = new Project();
		

		$datefrom = '01-0'.$month.'-2013';
		$dateto = '31-0'.$month.'-2013';
		$dateFrom = new MongoDate(strtotime($datefrom." 00:00:00"));
		$dateTo = new MongoDate(strtotime($dateto." 23:59:59"));

		$totalcount = $projects->count(array('createdDate'=>array('$gte'=>$dateFrom,'$lte'=>$dateTo),'projectStatus'=>$status));
	
		return $totalcount;
	}


}
