<?php

namespace spec\DanDMartin\Utilities\Time;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateSpanSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('DanDMartin\Utilities\Time\DateSpan');
    }

    function it_should_create_with_datetimes()
    {
    	$this->beConstructedWith(new \DateTime('2014-12-01'), new \DateTime('2014-12-31'));
    	$this->getStartDate()->shouldBeLike(new \DateTime('2014-12-01'));
    	$this->getEndDate()->shouldBeLike(new \DateTime('2014-12-31'));
    }

    function it_should_create_with_strings()
    {
    	$this->beConstructedWith('2014-12-01', '2014-12-31');
    	$this->getStartDate()->shouldBeLike(new \DateTime('2014-12-01'));
    	$this->getEndDate()->shouldBeLike(new \DateTime('2014-12-31'));
    }

    function it_should_default_to_now_if_not_specified()
    {
    	$this->getStartDate()->shouldBeLike(new \DateTime());
    	$this->getEndDate()->shouldBeLike(new \DateTime());
    }

    function it_should_allow_setting_start_date_with_datetime()
    {
    	$this->setStartDate(new \DateTime('1999-02-01'));
    	$this->getStartDate()->shouldBeLike(new \DateTime('1999-02-01'));
    }

    function it_should_allow_setting_end_date_with_datetime()
    {
    	$this->setEndDate(new \DateTime('1999-02-01'));
    	$this->getEndDate()->shouldBeLike(new \DateTime('1999-02-01'));
    }

    function it_should_allow_setting_start_date_with_string()
    {
    	$this->setStartDate('1999-02-01')->shouldReturn($this);
    	$this->getStartDate()->shouldBeLike(new \DateTime('1999-02-01'));
    }

    function it_should_allow_setting_end_date_with_string()
    {
    	$this->setEndDate('1999-02-01')->shouldReturn($this);
    	$this->getEndDate()->shouldBeLike(new \DateTime('1999-02-01'));
    }

    function it_should_ensure_start_date_precedes_end_date()
    {
    	// start and end dates swapped to ensure earliest first
    	$this->beConstructedWith('2014-12-01', '2013-12-31');
    	$this->getStartDate()->shouldBeLike(new \DateTime('2013-12-31'));
    	$this->getEndDate()->shouldBeLike(new \DateTime('2014-12-01'));
    }

}
