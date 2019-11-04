<?= snippet('header') ?>
	<main id="issue_content_wrapper">
    <?php if($issue->sidenav_order()->isNotEmpty()): ?>				
			<?=  snippet('components/sidenav', 
				[
					'nav_items' => $issue->sidenav_order()->toPages(), 
					'sticky' => 'sticky',
					'current' => $active_entry
				]); ?>
			
			<?php 
				$counter = 1; 
				foreach($issue->sidenav_order()->toPages() as $entry):
					$expanded = ($active_entry == $entry->slug()) ? 'expanded' : ''; 
			?>
				<?= snippet('components/sectionclosed', 
					[
						'section' => $entry,
						'sectioncount' => $counter,
						'expanded' => $expanded
					]) ?>

				<?php 
					$counter++;
				endforeach;
			endif; ?>
  </main>
  <!-- credit columns -->
<?php if($issue->credit_columns()->isNotEmpty()): ?>
	<?= snippet('components/creditcolumns', 
		[ 
			'credit_title' => 'Colophon',
			'credit_columns' => $issue->credit_columns()
		]) ?>
<?php endif; ?>

<?= snippet('footer') ?>