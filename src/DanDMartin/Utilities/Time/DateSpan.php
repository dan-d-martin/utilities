<?php

namespace DanDMartin\Utilities\Time;

/**
 * Represents a period of time between a start date/time and end date/time
 */
class DateSpan
{

    protected $start;
    protected $end;

    /**
     * Construct a new DateSpan
     * @param DateTime or string $start
     * @param DateTime or string $end
     */
    public function __construct($start = null, $end = null)
    {
        
        $this->setStartDate($start);
        $this->setEndDate($end);

        // if end is before start, swap them
        if($this->end < $this->start) {

            $temp = $this->end;
            $this->end = $this->start;
            $this->start = $temp;
        }
    }

    /**
     * Set the start date of the span
     * @param DateTime or string $start
     */
    public function setStartDate($start)
    {
        
        if(!$start instanceof \DateTime) {

            $start = new \DateTime($start);
        }

        $this->start = $start;
        return $this;
    }

    /**
     * Set the end date of the span
     * @param DateTime or string $start
     */
    public function setEndDate($end)
    {
        
        if(!$end instanceof \DateTime) {

            $end = new \DateTime($end);
        }

        $this->end = $end;
        return $this;
    }

    /**
     * Get the start date of the span
     * @return DateTime
     */
    public function getStartDate()
    {
        
        return $this->start;
    }

    /**
     * Get the end date of the span
     * @return DateTime
     */
    public function getEndDate()
    {
        
        return $this->end;
    }
}
