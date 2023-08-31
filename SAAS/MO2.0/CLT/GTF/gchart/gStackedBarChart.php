<?php
namespace gchart;
class gStackedBarChart extends gBarChart
{
    function __construct($width = 200, $height = 200)
    {
        $this->setChartType('s', 'v');
        $this->setDimensions($width, $height);
		$this-> setProperty('chm', 'N,FFFFFF,0,-1,11,,c|N,FFFFFF,1,-1,11,,c|N,FFFFFF,2,-1,11,,c|N,FFFFFF,3,-1,11,,c');
		//$this->setProperty('chma', '10,10,10,10|60,60');
    }
	
    public function setHorizontal($isHorizontal = true)
    {
        if($isHorizontal)
        {
            $this->setChartType('s', 'h');
        }
        else
        {
            $this->setChartType('s', 'v');
        }
    }
}