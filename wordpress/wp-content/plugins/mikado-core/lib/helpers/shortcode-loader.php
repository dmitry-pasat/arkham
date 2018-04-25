<?php

namespace Hoshi\Modules\Shortcodes\Lib;

use Hoshi\Modules\CallToAction\CallToAction;
use Hoshi\Modules\Counter\Countdown;
use Hoshi\Modules\Counter\Counter;
use Hoshi\Modules\ElementsHolder\ElementsHolder;
use Hoshi\Modules\ElementsHolderItem\ElementsHolderItem;
use Hoshi\Modules\GoogleMap\GoogleMap;
use Hoshi\Modules\Separator\Separator;
use Hoshi\Modules\PieCharts\PieChartBasic\PieChartBasic;
use Hoshi\Modules\PieCharts\PieChartDoughnut\PieChartDoughnut;
use Hoshi\Modules\PieCharts\PieChartDoughnut\PieChartPie;
use Hoshi\Modules\PieCharts\PieChartWithIcon\PieChartWithIcon;
use Hoshi\Modules\SeparatorWithIcon\SeparatorWithIcon;
use Hoshi\Modules\Shortcodes\AnimationsHolder\AnimationsHolder;
use Hoshi\Modules\Shortcodes\BlogSlider\BlogSlider;
use Hoshi\Modules\Shortcodes\Icon\Icon;
use Hoshi\Modules\Shortcodes\IconProgressBar;
use Hoshi\Modules\Shortcodes\ImageGallery\ImageGallery;
use Hoshi\Modules\Shortcodes\Process\ProcessHolder;
use Hoshi\Modules\Shortcodes\Process\ProcessItem;
use Hoshi\Modules\Shortcodes\SectionSubtitle\SectionSubtitle;
use Hoshi\Modules\Shortcodes\SectionTitle\SectionTitle;
use Hoshi\Modules\Shortcodes\TeamSlider\TeamSlider;
use Hoshi\Modules\Shortcodes\TeamSlider\TeamSliderItem;
use Hoshi\Modules\Shortcodes\VerticalProgressBar\VerticalProgressBar;
use Hoshi\Modules\Shortcodes\VideoBanner\VideoBanner;
use Hoshi\Modules\SocialShare\SocialShare;
use Hoshi\Modules\Team\Team;
use Hoshi\Modules\OrderedList\OrderedList;
use Hoshi\Modules\UnorderedList\UnorderedList;
use Hoshi\Modules\Message\Message;
use Hoshi\Modules\ProgressBar\ProgressBar;
use Hoshi\Modules\IconListItem\IconListItem;
use Hoshi\Modules\Tabs\Tabs;
use Hoshi\Modules\Tab\Tab;
use Hoshi\Modules\PricingTables\PricingTables;
use Hoshi\Modules\PricingTable\PricingTable;
use Hoshi\Modules\Accordion\Accordion;
use Hoshi\Modules\AccordionTab\AccordionTab;
use Hoshi\Modules\BlogList\BlogList;
use Hoshi\Modules\Shortcodes\Button\Button;
use Hoshi\Modules\Blockquote\Blockquote;
use Hoshi\Modules\CustomFont\CustomFont;
use Hoshi\Modules\Highlight\Highlight;
use Hoshi\Modules\VideoButton\VideoButton;
use Hoshi\Modules\Dropcaps\Dropcaps;
use Hoshi\Modules\Shortcodes\IconWithText\IconWithText;
use Hoshi\Modules\Shortcodes\TwitterSlider\TwitterSlider;
use Hoshi\Modules\Workflow\Workflow;
use Hoshi\Modules\WorkflowItem\WorkflowItem;
use Hoshi\Modules\Shortcodes\ZoomingSlider\ZoomingSlider;
use Hoshi\Modules\Shortcodes\ZoomingSlider\ZoomingSliderItem;
use Hoshi\Modules\Shortcodes\VerticalSplitSlider\VerticalSplitSlider;
use Hoshi\Modules\Shortcodes\VerticalSplitSliderContentItem\VerticalSplitSliderContentItem;
use Hoshi\Modules\Shortcodes\VerticalSplitSliderLeftPanel\VerticalSplitSliderLeftPanel;
use Hoshi\Modules\Shortcodes\VerticalSplitSliderRightPanel\VerticalSplitSliderRightPanel;
use Hoshi\Modules\Shortcodes\ThumbnailImageSlider\ThumbnailImageSlider;
use Hoshi\Modules\Shortcodes\ProductSlider\ProductSlider;
use Hoshi\Modules\Shortcodes\ExpandingImages\ExpandingImages;


/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {
	}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {
	}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {
	}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 *
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new Team());
		$this->addShortcode(new Icon());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new Message());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Separator());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new VideoBanner());
		$this->addShortcode(new AnimationsHolder());
		$this->addShortcode(new SectionTitle());
		$this->addShortcode(new SectionSubtitle());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new ProcessItem());
		$this->addShortcode(new VerticalProgressBar());
		$this->addShortcode(new IconProgressBar());
		$this->addShortcode(new BlogSlider());
		$this->addShortcode(new TwitterSlider());
        $this->addShortcode(new Workflow());
        $this->addShortcode(new WorkflowItem());
		$this->addShortcode(new TeamSlider());
		$this->addShortcode(new TeamSliderItem());
        $this->addShortcode(new ZoomingSlider());
        $this->addShortcode(new ZoomingSliderItem());
        $this->addShortcode(new VerticalSplitSlider());
        $this->addShortcode(new VerticalSplitSliderLeftPanel());
        $this->addShortcode(new VerticalSplitSliderRightPanel());
        $this->addShortcode(new VerticalSplitSliderContentItem());
        $this->addShortcode(new ThumbnailImageSlider());
		$this->addShortcode(new SeparatorWithIcon());
		$this->addShortcode(new ProductSlider());
		$this->addShortcode(new ExpandingImages());
	}

	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}

	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();