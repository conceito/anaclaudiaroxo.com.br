<?php 
/** ========================================================================
 * 	Inicia loop pela estrutura da survey
 * ------------------------------------------------------------------------
 */
if($structure):
$stepCount = 1;
foreach ($structure->steps() as $step):
?>
<div class="step-group">
	<div class="step-bar bar">
		<span class="type"><?php echo $stepCount?>)</span> <span class="title"><?php echo $step->titulo ?></span>		
	</div>


	<?php 
	/** ========================================================================
	 * 	Se existem perguntas sem grupo
	 * ------------------------------------------------------------------------
	 */
	if($structure->queries($step->id)):
	?>
	<div class="queries-group">
		
		<?php 
		foreach ($structure->queries($step->id) as $query):
		?>
		<div class="query-bar bar">
			<span class="type">&gt;</span> <span class="title"><?php echo $query->titulo ?></span>

			<table class="table table-condensed table-hover">
              <thead>
                <tr>
                  <th class="options">opções</th>
                  <th class="points">pontos</th>
                  <th class="percentuals">%</th>
                  <th class="percentuals-bar"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="options">Excelente</td>
                  <td class="points">39</td>
                  <td class="percentuals">33%</td>
                  <td> <div class="percent-bar" style="width:33%"><img src="<?php echo cms_img()?>color-blue.gif" alt=""></div> </td>
                </tr>
                <tr>
                  <td class="options">Bom</td>
                  <td class="points">22</td>
                  <td class="percentuals">14%</td>
                  <td> <div class="percent-bar" style="width:14%"><img src="<?php echo cms_img()?>color-blue.gif" alt=""></div> </td>
                </tr>
                <tr>
                  <td class="options">Ruim</td>
                  <td class="points">12</td>
                  <td class="percentuals">8%</td>
                  <td> <div class="percent-bar" style="width:8%"><img src="<?php echo cms_img()?>color-blue.gif" alt=""></div> </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td class="">total</td>
                  <td class="points">999</td>
                  <td class="percentuals">100%</td>
                  <td></td>
                </tr>
              </tfoot>
            </table>
			
		</div><!-- query-bar -->
		<?php 
		endforeach;
		?>
		
	</div><!-- queries-group -->
	<?php 
	endif;//perguntas sem grupo
	?>

	<?php 
	/** ========================================================================
	 * 	Looping pelos grupos de um passo
	 * ------------------------------------------------------------------------
	 */
	if($structure->groups($step->id)):
	?>
	<?php 
	$groupCount = 1;
	foreach ($structure->groups($step->id) as $group):
	?>
	<div class="group-group">
		<div class="group-bar bar">
			<span class="title"><?php echo $group->titulo ?></span>			
		</div>
	</div><!-- group-group -->
		<?php 
		/** ========================================================================
		 * 	Loop pelas questões do grupo
		 * ------------------------------------------------------------------------
		 */
		if($structure->queries($group->id)):
		?>
		<div class="queries-group">
			
			<?php 
			foreach ($structure->queries($group->id) as $query):
			?>
			<div class="query-bar bar">
				<span class="type">&gt;</span> <span class="title"><?php echo $query->titulo ?></span>
				
			</div><!-- query-bar -->
			<?php 
			endforeach;
			?>
			
		</div><!-- queries-group -->
		<?php 
		endif;//perguntas do grupo
		?>

	
	<?php 
	$groupCount++;
	endforeach;// groups
	?>

	<?php 
	endif;
	?>


</div><!-- step-group -->
<?php 
$stepCount++;
endforeach;// steps

endif;
?>



<?php 
# modelo
if(true == false):
 ?>
<!-- grupo de passos  -->
<div class="step-group">
	<div class="step-bar bar"><span class="type">Passo #1 -</span> <span class="title">Quanto aos seus primeiros atendimentos no consultório do cirurgião</span>
		<a href="#" class="btn">editar</a>
	</div>

	<div class="queries-group">

		<div class="query-bar bar">
			<span class="type">?</span> <span class="title">Atendimento ao telefone para marcação da consulta (rapidez, presteza, educação, etc)</span>
			<a href="#" class="btn">editar</a>
		</div><!-- query-bar -->

		<div class="query-bar bar">
			<span class="type">?</span> <span class="title">Atendimento ao telefone para marcação da consulta (rapidez, presteza, educação, etc)</span>
			<a href="#" class="btn">editar</a>
		</div><!-- query-bar -->
		
	</div><!-- queries-group -->
	
	<div class="group-group">
		<div class="group-bar bar"><span class="type">Grupo #1 -</span> <span class="title">Quanto aos seus primeiros atendimentos no consultório do cirurgião (Dr. Alexandre Siciliano)</span>
			<a href="#" class="btn">editar</a>
		</div>
		<div class="queries-group">

			<div class="query-bar bar">
				<span class="type">?</span> <span class="title">Atendimento ao telefone para marcação da consulta (rapidez, presteza, educação, etc)</span>
				<a href="#" class="btn">editar</a>
			</div><!-- query-bar -->

			<div class="query-bar bar">
				<span class="type">?</span> <span class="title">Atendimento ao telefone para marcação da consulta (rapidez, presteza, educação, etc)</span>
				<a href="#" class="btn">editar</a>
			</div><!-- query-bar -->
			
		</div><!-- queries-group -->
		
	</div><!-- group-group -->



<?php endif; ?>