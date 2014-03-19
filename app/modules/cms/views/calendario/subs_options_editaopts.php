<?php echo validation_errors(); ?>
<div ng-controller="OptionsController">
    

<div class="panel-left clearfix">

    <ul ui-sortable="sortableOptions" ng-model="opts" class="sortable-items"> 

    
        <li class="control-group box" ng-repeat="opt in opts">
            <a href="#" ng-click="remove(opt)" class="close">&times;</a>
        
        <label for="hora1" class="lb-full">Opção: {{ opt.titulo }}</label>
        <input name="hora1" type="text" class="input-longo" ng-model="opt.titulo" />
        <input name="hora1" type="text" class="input-longo" ng-model="opt.resumo" />
        
        
        </li><!-- .control-group -->
    </ul>
    
    
</div><!-- .panel-left -->


<div class="panel-right clearfix">

    
    <div class="control-group box">
        <br>
        <div class="btn-group btn-group-vertical">
            <a class="btn btn-warning" href="#" style="text-align: left;"> <i class="icon-plus icon-white"></i> Adicionar Grupo </a>
            <a class="btn btn-warning" href="#" style="text-align: left;"> <i class="icon-plus icon-white"></i> Adicionar Opção </a>
        </div>
        
    </div>

    
</div><!-- .panel-right -->


   
</div><!-- OptionsController -->