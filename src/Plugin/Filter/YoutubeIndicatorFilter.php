<?php

namespace Drupal\youtubeindicator\Plugin\Filter;

use Drupal\filter\Plugin\FilterBase;
use Drupal\filter\FilterProcessResult;

/**
 * @Filter(
 *   id = "filter_youtubeindicator",
 *   title = @Translation("Youtube Indicator Filter"),
 *   description = @Translation("Youtube video code to embed filter"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * )
 */
class YoutubeIndicatorFilter extends FilterBase {

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $switched = preg_replace("/\[yt: (.*)\]/i", "<input type='button' value='Youtube video' style='background-color: red;' onclick='showYt(\"$1\");' />", $text);
	$result = new FilterProcessResult($switched);
	$result->setAttachments(array(
      'library' => array('youtubeindicator/youtubeindicator-main', 'youtubeindicator/youtubeindicator-bootbox', 'youtubeindicator/youtubeindicator-bootstrap'),
    ));
    return $result;
  }

}
