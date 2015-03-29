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
/** 
* TODO: Semantic HTML5 markup
* TODO: Schema.org
* TODO: JRequest - depricated
*
*
*/
?>



<!-- Start K2 Item Layout -->
<!-- Plugins: BeforeDisplay -->
	<?php echo $this->item->event->BeforeDisplay; ?>

<!-- K2 Plugins: K2BeforeDisplay -->
	<?php echo $this->item->event->K2BeforeDisplay; ?>


<!-- Date created -->
	<?php if($this->item->params->get('itemDateCreated')): ?>
		<?php echo JHTML::_('date', $this->item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
	<?php endif; ?>

<!-- Item title -->
	<?php if($this->item->params->get('itemTitle')): ?>
		<h2><?php echo $this->item->title; ?></h2>
	<?php endif; ?>	

<!-- Featured flag -->	
	<?php if($this->item->params->get('itemFeaturedNotice') && $this->item->featured): ?>
  		<?php echo JText::_('K2_FEATURED'); ?>
	<?php endif; ?>

	  
	  
<!-- Item Author -->
	<?php if($this->item->params->get('itemAuthor')): ?>
			<?php echo K2HelperUtilities::writtenBy($this->item->author->profile->gender); ?>
			<?php if(empty($this->item->created_by_alias)): ?>
			<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
			<?php else: ?>
			<?php echo $this->item->author->name; ?>
			<?php endif; ?>
	<?php endif; ?>



<!-- Plugins: AfterDisplayTitle -->
	<?php echo $this->item->event->AfterDisplayTitle; ?>

<!-- K2 Plugins: K2AfterDisplayTitle -->
	<?php echo $this->item->event->K2AfterDisplayTitle; ?>
<!-- Email Button -->
	<?php if($this->item->params->get('itemEmailButton') && !JRequest::getInt('print')): ?>
				<a class="itemEmailLink" rel="nofollow" href="<?php echo $this->item->emailLink; ?>" onclick="window.open(this.href,'emailWindow','width=400,height=350,location=no,menubar=no,resizable=no,scrollbars=no'); return false;">
					<span><?php echo JText::_('K2_EMAIL'); ?></span>
				</a>
	<?php endif; ?>


<!-- Anchor to VIDEO - if it exists -->
	<?php if($this->item->params->get('itemVideoAnchor') && !empty($this->item->video)): ?>
				<a class="itemVideoLink k2Anchor" href="<?php echo $this->item->link; ?>#itemVideoAnchor"><?php echo JText::_('K2_MEDIA'); ?></a>
	<?php endif; ?>

<!-- Anchor to Gallery - if it exists -->
	<?php if($this->item->params->get('itemImageGalleryAnchor') && !empty($this->item->gallery)): ?>
				<a class="itemImageGalleryLink k2Anchor" href="<?php echo $this->item->link; ?>#itemImageGalleryAnchor"><?php echo JText::_('K2_IMAGE_GALLERY'); ?></a>
	<?php endif; ?>

<!-- Anchor link to comments below - if enabled -->
	<?php if($this->item->params->get('itemCommentsAnchor') && $this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1')) ): ?>
				<?php if(!empty($this->item->event->K2CommentsCounter)): ?>
					<!-- K2 Plugins: K2CommentsCounter -->
					<?php echo $this->item->event->K2CommentsCounter; ?>
				<?php else: ?>
					<?php if($this->item->numOfComments > 0): ?>
					<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
						<span><?php echo $this->item->numOfComments; ?></span> <?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
					</a>
					<?php else: ?>
					<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
						<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
					</a>
					<?php endif; ?>
				<?php endif; ?> 
	<?php endif; ?>
	
<!-- Item Rating -->
<!-- Dependency - k2.js -->
	<?php if($this->item->params->get('itemRating')): ?>
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
		</div>
	
	<?php endif; ?>

<!-- Основной контент -->

<!-- Plugins: BeforeDisplayContent -->
	<?php echo $this->item->event->BeforeDisplayContent; ?>

<!-- K2 Plugins: K2BeforeDisplayContent -->
	<?php echo $this->item->event->K2BeforeDisplayContent; ?>

<!-- Основное изображение материала -->
	<?php if($this->item->params->get('itemImage') && !empty($this->item->image)): ?>
		  	<a class="modal" rel="{handler: 'image'}" href="<?php echo $this->item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>">
		  		<img src="<?php echo $this->item->image; ?>" alt="<?php if(!empty($this->item->image_caption)) echo K2HelperUtilities::cleanHtml($this->item->image_caption); else echo K2HelperUtilities::cleanHtml($this->item->title); ?>" style="width:<?php echo $this->item->imageWidth; ?>px; height:auto;" />
		  	</a>

<!-- Image caption -->
		<?php if($this->item->params->get('itemImageMainCaption') && !empty($this->item->image_caption)): ?>
			<?php echo $this->item->image_caption; ?>
		<?php endif; ?>
<!-- Image credits -->
		<?php if($this->item->params->get('itemImageMainCredits') && !empty($this->item->image_credits)): ?>
			<?php echo $this->item->image_credits; ?>
		<?php endif; ?>

	<?php endif; ?><!-- /.Основное изображение материала -->

<!-- Основной текст -->
	<?php if(!empty($this->item->fulltext)): ?>
		<?php if($this->item->params->get('itemIntroText')): ?>
	  <!-- Item introtext -->
	  	  	<?php echo $this->item->introtext; ?>
		<?php endif; ?>
		<?php if($this->item->params->get('itemFullText')): ?>
	  <!-- Item fulltext -->
		<?php echo $this->item->fulltext; ?>
		<?php endif; ?>
		<?php else: ?>
	  <!-- Item text -->
	  	<?php echo $this->item->introtext; ?>
	<?php endif; ?>
<!-- /.Основной текст -->

<!-- Item extra fields -->
	<?php if($this->item->params->get('itemExtraFields') && count($this->item->extra_fields)): ?>
		<?php echo JText::_('K2_ADDITIONAL_INFO'); ?> <!-- Заголовок над полями -->
	  	<ul>
	  		<!-- Цикл -->
			<?php foreach ($this->item->extra_fields as $key=>$extraField): ?>
			<?php if($extraField->value != ''): ?>
			<li class="type<?php echo ucfirst($extraField->type); ?> group<?php echo $extraField->group; ?>">
				<?php if($extraField->type == 'header'): ?>
				<h4 class="itemExtraFieldsHeader"><?php echo $extraField->name; ?></h4>
				<?php else: ?>
				<span class="itemExtraFieldsLabel"><?php echo $extraField->name; ?>:</span>
				<span class="itemExtraFieldsValue"><?php echo $extraField->value; ?></span>
				<?php endif; ?>
			</li>
			<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

<!-- Item Hits -->
	<?php if($this->item->params->get('itemHits')): ?>
		<?php echo JText::_('K2_READ'); ?> 
		<?php echo $this->item->hits; ?>
		<?php echo JText::_('K2_TIMES'); ?>
	<?php endif; ?>
<!-- Item date modified -->
	<?php if($this->item->params->get('itemDateModified') && intval($this->item->modified)!=0): ?>
		<?php echo JText::_('K2_LAST_MODIFIED_ON'); ?> <?php echo JHTML::_('date', $this->item->modified, JText::_('K2_DATE_FORMAT_LC2')); ?>
	<?php endif; ?>


<!-- Plugins: AfterDisplayContent -->
	  <?php echo $this->item->event->AfterDisplayContent; ?>

<!-- K2 Plugins: K2AfterDisplayContent -->
	  <?php echo $this->item->event->K2AfterDisplayContent; ?>



<!-- Social sharing -->
<!-- Убрал родные кнопки, делаем замену на вставку кода -->
<!-- Item Social Button -->
	<?php if($this->item->params->get('itemSocialButton') && !is_null($this->item->params->get('socialButtonCode', NULL))): ?>
			<?php echo $this->item->params->get('socialButtonCode'); ?>
	<?php endif; ?>


<!-- Item category -->
	<?php if($this->item->params->get('itemCategory')): ?>
			<?php echo JText::_('K2_PUBLISHED_IN'); ?>
			<a href="<?php echo $this->item->category->link; ?>"><?php echo $this->item->category->name; ?></a>
	<?php endif; ?>

<!-- Item tags -->
	<?php if($this->item->params->get('itemTags') && count($this->item->tags)): ?>
		  <?php echo JText::_('K2_TAGGED_UNDER'); ?>
		  <ul class="itemTags">
		    <?php foreach ($this->item->tags as $tag): ?>
		    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
		    <?php endforeach; ?>
		  </ul>
	<?php endif; ?>

<!-- Item attachments -->
	<?php if($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>
	  <!-- Item attachments -->
		  <span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
		  <ul class="itemAttachments">
		    <?php foreach ($this->item->attachments as $attachment): ?>
		    <li>
			    <a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
			    <?php if($this->item->params->get('itemAttachmentsCounter')): ?>
			    <span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits==1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
			    <?php endif; ?>
		    </li>
		    <?php endforeach; ?>
		  </ul>
	<?php endif; ?>


<!-- Author Block -->
	<?php if($this->item->params->get('itemAuthorBlock') && empty($this->item->created_by_alias)): ?>
  
<!-- Аватар автора -->
  	<?php if($this->item->params->get('itemAuthorImage') && !empty($this->item->author->avatar)): ?>
  		<img src="<?php echo $this->item->author->avatar; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($this->item->author->name); ?>" />
  	<?php endif; ?>
<!-- Имя автора -->
	<a rel="author" href="<?php echo $this->item->author->link; ?>"><?php echo $this->item->author->name; ?></a>
<!-- Описание автора -->
    <?php if($this->item->params->get('itemAuthorDescription') && !empty($this->item->author->profile->description)): ?>
    		<?php echo $this->item->author->profile->description; ?>
    <?php endif; ?>
<!-- Сайт автора -->
    <?php if($this->item->params->get('itemAuthorURL') && !empty($this->item->author->profile->url)): ?>
    <a rel="me" href="<?php echo $this->item->author->profile->url; ?>" target="_blank"><?php echo str_replace('http://','',$this->item->author->profile->url); ?></a>
    <?php endif; ?>
<!-- Email автора -->
    <?php if($this->item->params->get('itemAuthorEmail')): ?>
    <?php echo JText::_('K2_EMAIL'); ?> <?php echo JHTML::_('Email.cloak', $this->item->author->email); ?>
    <?php endif; ?>


<!-- K2 Plugins: K2UserDisplay -->
			<?php echo $this->item->event->K2UserDisplay; ?>
	<?php endif; ?>
<!-- /.Author Block -->

<!-- Latest items from author -->
	<?php if($this->item->params->get('itemAuthorLatest') && empty($this->item->created_by_alias) && isset($this->authorLatestItems)): ?>
		<?php echo JText::_('K2_LATEST_FROM'); ?>
		<?php echo $this->item->author->name; ?>
		<ul>
			<?php foreach($this->authorLatestItems as $key=>$item): ?>
			<li>
				<a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
			</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php
	/*
	Note regarding 'Related Items'!
	If you add:
	- the CSS rule 'overflow-x:scroll;' in the element div.itemRelated {…} in the k2.css
	- the class 'k2Scroller' to the ul element below
	- the classes 'k2ScrollerElement' and 'k2EqualHeights' to the li element inside the foreach loop below
	- the style attribute 'style="width:<?php echo $item->imageWidth; ?>px;"' to the li element inside the foreach loop below
	...then your Related Items will be transformed into a vertical-scrolling block, inside which, all items have the same height (equal column heights). This can be very useful if you want to show your related articles or products with title/author/category/image etc., which would take a significant amount of space in the classic list-style display.
	*/
	?>
<!-- Related items by tag -->
	<?php if($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>
		<?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?>
		<ul>
			<?php foreach($this->relatedItems as $key=>$item): ?>
			<li>

				<?php if($this->item->params->get('itemRelatedTitle', 1)): ?>
					<a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedCategory')): ?>
					<?php echo JText::_("K2_IN"); ?>
					<a href="<?php echo $item->category->link ?>"><?php echo $item->category->name; ?></a>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedAuthor')): ?>
				<?php echo JText::_("K2_BY"); ?> <a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedImageSize')): ?>
				<img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" src="<?php echo $item->image; ?>" alt="<?php K2HelperUtilities::cleanHtml($item->title); ?>" />
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedIntrotext')): ?>
				<?php echo $item->introtext; ?>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedFulltext')): ?>
				<?php echo $item->fulltext; ?>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedMedia')): ?>
				<?php if($item->videoType=='embedded'): ?>
				<?php echo $item->video; ?>
				<?php else: ?>
				<?php echo $item->video; ?>
				<?php endif; ?>
				<?php endif; ?>

				<?php if($this->item->params->get('itemRelatedImageGallery')): ?>
				<?php echo $item->gallery; ?>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

<!-- Item video -->
	<?php if($this->item->params->get('itemVideo') && !empty($this->item->video)): ?>
		<a name="itemVideoAnchor" id="itemVideoAnchor"></a>
		<?php echo JText::_('K2_MEDIA'); ?></h3>
<!-- Деление для различной стилизации -->
		<?php if($this->item->videoType=='embedded'): ?>
			<?php echo $this->item->video; ?>
		<?php else: ?>
			<?php echo $this->item->video; ?>
		<?php endif; ?>

		<?php if($this->item->params->get('itemVideoCaption') && !empty($this->item->video_caption)): ?>
			<?php echo $this->item->video_caption; ?>
		<?php endif; ?>

		<?php if($this->item->params->get('itemVideoCredits') && !empty($this->item->video_credits)): ?>
			<?php echo $this->item->video_credits; ?>
		<?php endif; ?>
	<?php endif; ?>


<!-- Item image gallery -->
	<?php if($this->item->params->get('itemImageGallery') && !empty($this->item->gallery)): ?>
		<a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
		<?php echo JText::_('K2_IMAGE_GALLERY'); ?>
		<?php echo $this->item->gallery; ?>
	<?php endif; ?>


<!-- Item navigation -->
	<?php if($this->item->params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>
			<?php echo JText::_('K2_MORE_IN_THIS_CATEGORY'); ?>
<!-- itemPrevious -->
			<?php if(isset($this->item->previousLink)): ?>
			<a href="<?php echo $this->item->previousLink; ?>">
				<?php echo $this->item->previousTitle; ?>
			</a>
			<?php endif; ?>
<!-- itemNext -->
			<?php if(isset($this->item->nextLink)): ?>
			<a href="<?php echo $this->item->nextLink; ?>">
				<?php echo $this->item->nextTitle; ?>
			</a>
			<?php endif; ?>
	<?php endif; ?>

<!-- Plugins: AfterDisplay -->
	<?php echo $this->item->event->AfterDisplay; ?>

<!-- K2 Plugins: K2AfterDisplay -->
	<?php echo $this->item->event->K2AfterDisplay; ?>

<!-- K2 Plugins: K2CommentsBlock -->
	<?php if($this->item->params->get('itemComments') && ( ($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1'))): ?>
		<?php echo $this->item->event->K2CommentsBlock; ?>
	<?php endif; ?>
<!-- Item comments -->
	<?php if($this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2')) && empty($this->item->event->K2CommentsBlock)): ?>
	<a name="itemCommentsAnchor" id="itemCommentsAnchor"></a>

<!-- Item comments form -->
	<?php if($this->item->params->get('commentsFormPosition')=='above' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
		<?php echo $this->loadTemplate('comments_form'); ?>
	<?php endif; ?>
<!-- Item user comments -->
	<?php if($this->item->numOfComments>0 && $this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2'))): ?>
			<!-- itemCommentsCounter -->
			<?php echo $this->item->numOfComments; ?>
			<?php echo ($this->item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>


	    	<?php foreach ($this->item->comments as $key=>$comment): ?>
	    	<li class="<?php echo (!$this->item->created_by_alias && $comment->userID==$this->item->created_by) ? " authorResponse" : ""; echo($comment->published) ? '':' unpublishedComment'; ?>">

	    	<!--commentLink -->
		    	<a href="<?php echo $this->item->link; ?>#comment<?php echo $comment->id; ?>" name="comment<?php echo $comment->id; ?>" id="comment<?php echo $comment->id; ?>">
		    		<?php echo JText::_('K2_COMMENT_LINK'); ?>
		    	</a>
		    

				<?php if($comment->userImage): ?>
				<img src="<?php echo $comment->userImage; ?>" alt="<?php echo JFilterOutput::cleanText($comment->userName); ?>" width="<?php echo $this->item->params->get('commenterImgWidth'); ?>" />
				<?php endif; ?>

				<!-- commentDate -->
		    	<?php echo JHTML::_('date', $comment->commentDate, JText::_('K2_DATE_FORMAT_LC2')); ?>
		    	

		    <!-- commentAuthorName -->
			    <?php echo JText::_('K2_POSTED_BY'); ?>
			    <?php if(!empty($comment->userLink)): ?>
			    <a href="<?php echo JFilterOutput::cleanText($comment->userLink); ?>" title="<?php echo JFilterOutput::cleanText($comment->userName); ?>" target="_blank" rel="nofollow">
			    	<?php echo $comment->userName; ?>
			    </a>
			    <?php else: ?>
			    <?php echo $comment->userName; ?>
			    <?php endif; ?>
	

		    	<?php echo $comment->commentText; ?>

				<?php if($this->inlineCommentsModeration || ($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest)))): ?>
				<!-- commentToolbar -->
					<?php if($this->inlineCommentsModeration): ?>
					<?php if(!$comment->published): ?>
					<!-- ApproveLink -->
					<a href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=publish&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_APPROVE')?></a>
					<?php endif; ?>
					<!-- RemoveLink -->
					<a href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=remove&commentID='.$comment->id.'&format=raw')?>"><?php echo JText::_('K2_REMOVE')?></a>
					<?php endif; ?>

					<?php if($comment->published && ($this->params->get('commentsReporting')=='1' || ($this->params->get('commentsReporting')=='2' && !$this->user->guest))): ?>
					<a class="modal" rel="{handler:'iframe',size:{x:560,y:480}}" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=report&commentID='.$comment->id)?>"><?php echo JText::_('K2_REPORT')?></a>
					<?php endif; ?>

					<?php if($comment->reportUserLink): ?>
					<a class="k2ReportUserButton" href="<?php echo $comment->reportUserLink; ?>"><?php echo JText::_('K2_FLAG_AS_SPAMMER'); ?></a>
					<?php endif; ?>
				<?php endif; ?>
	    	</li>
	    	<?php endforeach; ?>
<!-- itemCommentsPagination -->
	  	    <?php echo $this->pagination->getPagesLinks(); ?>
	<?php endif; ?>
<!-- /.Item user comments -->
<!-- Item comments form -->
		<?php if($this->item->params->get('commentsFormPosition')=='below' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>
		<?php echo $this->loadTemplate('comments_form'); ?>
		<?php endif; ?>

		<?php $user = JFactory::getUser(); if ($this->item->params->get('comments') == '2' && $user->guest): ?>
	 		<?php echo JText::_('K2_LOGIN_TO_POST_COMMENTS'); ?>
		<?php endif; ?>


	<?php endif; ?>


<!-- End K2 Item Layout -->
