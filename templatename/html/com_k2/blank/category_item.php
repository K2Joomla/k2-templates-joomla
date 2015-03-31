<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

?>

<!-- Start K2 Item Layout -->

<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>

<!-- Date created -->
		<?php if($this->item->params->get('catItemDateCreated')): ?>
			<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
		<?php endif; ?>
<!-- Item title -->
		<?php if($this->item->params->get('catItemTitle')): ?>
	  	<?php if ($this->item->params->get('catItemTitleLinked')): ?>
			<a href="<?php echo $this->item->link; ?>">
	  		<?php echo $this->item->title; ?>
	  		</a>
	  	<?php else: ?>
	  	<?php echo $this->item->title; ?>
	  	<?php endif; ?>
		<?php endif; ?>
<!-- Featured flag -->
	  	<?php if($this->item->params->get('catItemFeaturedNotice') && $this->item->featured): ?>
		  		<?php echo JText::_('K2_FEATURED'); ?>
	  	<?php endif; ?>

<!-- Item Author -->
		<?php if($this->item->params->get('catItemAuthor')): ?>
			<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?> 
			<?php if(isset($this->item->author->link) && $this->item->author->link): ?>
			<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
			<?php else: ?>
			<?php echo $this->item->author->name; ?>
			<?php endif; ?>
		<?php endif; ?>


<!-- Plugins: AfterDisplayTitle -->
	<?php echo $this->item->event->AfterDisplayTitle; ?>

<!-- K2 Plugins: K2AfterDisplayTitle -->
	<?php echo $this->item->event->K2AfterDisplayTitle; ?>

<!-- Item Rating -->
	<?php if($this->item->params->get('catItemRating')): ?>
		<?php echo JText::_('K2_RATE_THIS_ITEM'); ?>
		<div class="itemRatingForm">
			<ul class="itemRatingList">
				<li class="itemCurrentRating" id="itemCurrentRating<?php echo $this->item->id; ?>" style="width:<?php echo $this->item->votingPercentage; ?>%;"></li>
				<li><a href="#" data-id="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_1_STAR_OUT_OF_5'); ?>" class="one-star">1</a></li>
				<li><a href="#" data-id="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_2_STARS_OUT_OF_5'); ?>" class="two-stars">2</a></li>
				<li><a href="#" data-id="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_3_STARS_OUT_OF_5'); ?>" class="three-stars">3</a></li>
				<li><a href="#" data-id="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_4_STARS_OUT_OF_5'); ?>" class="four-stars">4</a></li>
				<li><a href="#" data-id="<?php echo $this->item->id; ?>" title="<?php echo JText::_('K2_5_STARS_OUT_OF_5'); ?>" class="five-stars">5</a></li>
			</ul>
			<div id="itemRatingLog<?php echo $this->item->id; ?>" class="itemRatingLog"><?php echo $this->item->numOfvotes; ?></div>
			<div class="clr"></div>
		</div>
	<?php endif; ?>


<!-- Plugins: BeforeDisplayContent -->
	<?php echo $this->item->event->BeforeDisplayContent; ?>

<!-- K2 Plugins: K2BeforeDisplayContent -->
	<?php echo $this->item->event->K2BeforeDisplayContent; ?>
<!-- Item Image -->
	  <?php if($this->item->params->get('catItemImage') && !empty($this->item->image)): ?>
		    <a href="<?php echo $this->item->link; ?>" title="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>">
		    	<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
		    </a>
	  <?php endif; ?>
<!-- Item introtext -->
	  <?php if($this->item->params->get('catItemIntroText')): ?>
	  	<?php echo $this->item->introtext; ?>
	  <?php endif; ?>

<!-- Item extra fields -->
	  <?php if($this->item->params->get('catItemExtraFields') && count($this->item->extra_fields)): ?>
	  	<?php echo JText::_('K2_ADDITIONAL_INFO'); ?>
	  	<ul>
			<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
			<?php if($extraField->value != ''): ?>
			<li class="<?php echo ($key%2) ? "odd" : "even"; ?> type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
				<?php if($extraField->type == 'header'): ?>
				<h4 class="catItemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
				<?php else: ?>
				<span class="catItemExtraFieldsLabel"><?php echo $extraField->name; ?></span>
				<span class="catItemExtraFieldsValue"><?php echo $extraField->value; ?></span>
				<?php endif; ?>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>
			</ul>
	  <?php endif; ?>

<!-- Plugins: AfterDisplayContent -->
	<?php echo $this->item->event->AfterDisplayContent; ?>

<!-- K2 Plugins: K2AfterDisplayContent -->
	<?php echo $this->item->event->K2AfterDisplayContent; ?>



<!-- Item Hits -->
		<?php if($this->item->params->get('catItemHits')): ?>
				<?php echo JText::_('K2_READ'); ?>
				<?php echo $this->item->hits; ?>
				<?php echo JText::_('K2_TIMES'); ?>
		<?php endif; ?>
<!-- Item category name -->
		<?php if($this->item->params->get('catItemCategory')): ?>
			<?php echo JText::_('K2_PUBLISHED_IN'); ?>
			<a href="<?php echo $this->item->category->link; ?>">
			<?php echo $this->item->category->name; ?>
			</a>
		<?php endif; ?>
<!-- Item tags -->
	  <?php if($this->item->params->get('catItemTags') && count($this->item->tags)): ?>
	  	<?php echo JText::_('K2_TAGGED_UNDER'); ?>
		  <ul>
		    <?php foreach ($this->item->tags as $tag): ?>
		    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
		    <?php endforeach; ?>
		  </ul>
	  <?php endif; ?>

<!-- Item attachments -->
	  <?php if($this->item->params->get('catItemAttachments') && count($this->item->attachments)): ?>
		  <?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?>
		  <ul>
		    <?php foreach ($this->item->attachments as $attachment): ?>
		    <li>
			    <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>">
			    	<?php echo $attachment->title ; ?>
			    </a>
			    <?php if($this->item->params->get('catItemAttachmentsCounter')): ?>
			    (<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)
			    <?php endif; ?>
		    </li>
		    <?php endforeach; ?>
		  </ul>
	  <?php endif; ?>

<!-- Item video -->
  <?php if($this->item->params->get('catItemVideo') && !empty($this->item->video)): ?>
  	<?php echo JText::_('K2_RELATED_VIDEO'); ?>
		<?php if($this->item->videoType=='embedded'): ?>
		<?php echo $this->item->video; ?>
		<?php else: ?>
		<?php echo $this->item->video; ?>
		<?php endif; ?>
  <?php endif; ?>
<!-- Item image gallery -->
  <?php if($this->item->params->get('catItemImageGallery') && !empty($this->item->gallery)): ?>
	  <?php echo JText::_('K2_IMAGE_GALLERY'); ?>
	  <?php echo $this->item->gallery; ?>
  <?php endif; ?>

<!-- Anchor link to comments below -->
	<?php if($this->item->params->get('catItemCommentsAnchor') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
	<!-- Anchor link to comments below -->
		<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
			<!-- K2 Plugins: K2CommentsCounter -->
			<?php echo $this->item->event->K2CommentsCounter; ?>
		<?php else: ?>
			<?php if($this->item->numOfComments > 0): ?>
			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo $this->item->numOfComments; ?> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
			</a>
			<?php else: ?>
			<a href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
			</a>
			<?php endif; ?>
		<?php endif; ?>
	<?php endif; ?>
<!-- Item "read more..." link -->
	<?php if ($this->item->params->get('catItemReadMore')): ?>
		<a href="<?php echo $this->item->link; ?>">
			<?php echo JText::_('K2_READ_MORE'); ?>
		</a>
	<?php endif; ?>

<!-- Item date modified -->
	<?php if($this->item->params->get('catItemDateModified')): ?>
	<?php if($this->item->modified != $this->nullDate && $this->item->modified != $this->item->created ): ?>
	<?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> 
	<?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
	<?php endif; ?>
	<?php endif; ?>

<!-- Plugins: AfterDisplay -->
	<?php echo $this->item->event->AfterDisplay; ?>

<!-- K2 Plugins: K2AfterDisplay -->
	<?php echo $this->item->event->K2AfterDisplay; ?>


<!-- End K2 Item Layout -->
