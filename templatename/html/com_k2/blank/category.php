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

?>

<!-- Start K2 Category Layout -->
	<?php if($this->params->get('show_page_title')): ?>
<!-- Page title -->
		<?php echo $this->escape($this->params->get('page_title')); ?>
	<?php endif; ?>


<!-- Blocks for current category and subcategories -->
	<?php if(isset($this->category) || ( $this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories) )): ?>
<!-- Category block -->		
		<?php if(isset($this->category) && ( $this->params->get('catImage') || $this->params->get('catTitle') || $this->params->get('catDescription') || $this->category->event->K2CategoryDisplay )): ?>
		<!-- Category block -->
<!-- Category image -->
			<?php if($this->params->get('catImage') && $this->category->image): ?>
			<!-- Category image -->
			<img alt="<?php echo K2HelperUtilities::cleanHtml($this->category->name); ?>" src="<?php echo $this->category->image; ?>" style="width:<?php echo $this->params->get('catImageWidth'); ?>px; height:auto;" />
			<?php endif; ?>
<!-- Category title -->
			<?php if($this->params->get('catTitle')): ?>
				<?php echo $this->category->name; ?><?php if($this->params->get('catTitleItemCounter')) echo ' ('.$this->pagination->total.')'; ?>
			<?php endif; ?>
<!-- Category description -->
			<?php if($this->params->get('catDescription')): ?>
			<?php echo $this->category->description; ?>
			<?php endif; ?>

<!-- K2 Plugins: K2CategoryDisplay -->
			<?php echo $this->category->event->K2CategoryDisplay; ?>
		<?php endif; ?><!-- /. Category block -->

<!-- Subcategories -->
		<?php if($this->params->get('subCategories') && isset($this->subCategories) && count($this->subCategories)): ?>
			<?php echo JText::_('K2_CHILDREN_CATEGORIES'); ?>

			<?php foreach($this->subCategories as $key=>$subCategory): ?>
<!-- Subcategory image -->
					<?php if($this->params->get('subCatImage') && $subCategory->image): ?>
					<a class="subCategoryImage" href="<?php echo $subCategory->link; ?>">
						<img alt="<?php echo K2HelperUtilities::cleanHtml($subCategory->name); ?>" src="<?php echo $subCategory->image; ?>" />
					</a>
					<?php endif; ?>
<!-- Subcategory title -->
					<?php if($this->params->get('subCatTitle')): ?>
						<a href="<?php echo $subCategory->link; ?>">
							<?php echo $subCategory->name; ?><?php if($this->params->get('subCatTitleItemCounter')) echo ' ('.$subCategory->numOfItems.')'; ?>
						</a>
					<?php endif; ?>
<!-- Subcategory description -->
					<?php if($this->params->get('subCatDescription')): ?>
					<?php echo $subCategory->description; ?>
					<?php endif; ?>

<!-- Subcategory more... -->
					<a href="<?php echo $subCategory->link; ?>">
						<?php echo JText::_('K2_VIEW_ITEMS'); ?>
					</a>
			<?php endforeach; ?>
		<?php endif; ?>
	<?php endif; ?> <!-- /.Blocks for current category and subcategories -->


<!-- Item list -->
	<?php if((isset($this->leading) || isset($this->primary) || isset($this->secondary) || isset($this->links)) && (count($this->leading) || count($this->primary) || count($this->secondary) || count($this->links))): ?>

<!-- Leading items -->
		<?php if(isset($this->leading) && count($this->leading)): ?>
			<?php foreach($this->leading as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
<!-- Primary items -->
		<?php if(isset($this->primary) && count($this->primary)): ?>
			<?php foreach($this->primary as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
<!-- Secondary items -->
		<?php if(isset($this->secondary) && count($this->secondary)): ?>
			<?php foreach($this->secondary as $key=>$item): ?>
				<?php
					// Load category_item.php by default
					$this->item=$item;
					echo $this->loadTemplate('item');
				?>
			<?php endforeach; ?>
		<?php endif; ?>
<!-- Link items -->
		<?php if(isset($this->links) && count($this->links)): ?>
			<?php echo JText::_('K2_MORE'); ?>
			<?php foreach($this->links as $key=>$item): ?>
				<?php
					// Load category_item_links.php by default
					$this->item=$item;
					echo $this->loadTemplate('item_links');
				?>
			<?php endforeach; ?>
		<?php endif; ?>



	<!-- Pagination -->
	<?php if($this->pagination->getPagesLinks()): ?>
		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
		<?php if($this->params->get('catPaginationResults')) echo $this->pagination->getPagesCounter(); ?>
	<?php endif; ?>
	<?php endif; ?>

<!-- End K2 Category Layout -->
