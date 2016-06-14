<?php
App:: import('Controller', array('Users', 'Categories'));
$categoriesController = new CategoriesController;

?>
<style>
	
</style>
<div class="col-sm-2 col-md-3"></div>
<div class="col-xs-12 col-sm-8 col-md-6">
	<div id="header" class="bg-content">
		<!-- execute income, expense and total -->
		<?php 
		$income = $wallet['Wallet']['starting_amount']; 
		$expense = 0;

		foreach ($wallet['Transaction'] as $Transaction) {
            # code...
			$Category = $categoriesController->getCategoryById($Transaction['category_id']);
			if ($Category['Category']['type'] == 0 && date('m y', strtotime($Transaction['date'])) == date('m y')) {
                # code...
				$expense += $Transaction['cost'];
			} else if ($Category['Category']['type'] == 1 && date('m y', strtotime($Transaction['date'])) == date('m y')) {
				$income += $Transaction['cost'];
			}
		}
		$realIncome = $income - $wallet['Wallet']['starting_amount'];
		?>
		<div id="walletName">
			<h2><?php echo $wallet['Wallet']['name'];?></h2>
		</div>
		<div id="info" class="">
			<table class="table">
				<tr>
					<td class="title">INCOME</td>
					<td class="cost income"><?php echo $realIncome; ?></td>
				</tr>
				<tr class="" style="border-bottom: solid 1px #cccccc">
					<td class="title">EXPENSE</td>
					<td class="cost expense"><?php echo $expense; ?></td>
				</tr>
				<tr>
					<td class="title"></td>
					<td class="cost"><?php echo $realIncome - $expense; ?></td>
				</tr>
			</table>
		</div>
	</div>
	<div id="body">

		<div id="expense" class="bg-content transaction">
			<dl>
				<dt><span class="">Expense</span></dt>

				<?php
				foreach ($categories as $Category) {
					$exp = 0;
					foreach ($wallet['Transaction'] as $Transaction) {
						if ($Transaction['category_id'] == $Category['Category']['id'] && date('m y', strtotime($Transaction['date'])) == date('m y')) {
							if ($Category['Category']['type'] == 0) {
								$exp += $Transaction['cost'];
							}
						}
					}
					if ($Category['Category']['type'] == 0 && $exp != 0) {
						$percentage = ((float)$exp*100/(float)$expense);
						?>
						<dd class="percentage-expense percentage <?php echo 'percentage-'.(int)$percentage;?>">
							<span class="text"><?php echo $Category['Category']['name'].': '.number_format($percentage, 2).'%';?></span>
						</dd>
						<?php	
					}	
				}
				?>
			</dl>
		</div>
		<div id="income" class="bg-content transaction">
			<dl>
				<dt><span class="">Income</span></dt>

				<?php
				foreach ($categories as $Category) {
					$inc = 0;
					foreach ($wallet['Transaction'] as $Transaction) {
						if ($Transaction['category_id'] == $Category['Category']['id'] && date('m y', strtotime($Transaction['date'])) == date('m y')) {
							if ($Category['Category']['type'] == 1) {
								$inc += $Transaction['cost'];
							}
						}
					}
					if ($Category['Category']['type'] == 1 && $inc != 0) {
						$percentage = ((float)$inc*100/(float)$realIncome);
						?>
						<dd class="percentage-income percentage <?php echo 'percentage-'.(int)$percentage;?>">
							<span class="text"><?php echo $Category['Category']['name'].': '.number_format($percentage, 2).'%';?></span>
						</dd>
						<?php	
					}	
				}
				?>
			</dl>
		</div>
		
	</div>

	<?php

	?>
</div>
