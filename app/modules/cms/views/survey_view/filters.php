<div class="fil-row">

    <div class="fil">

        <a href="<?php echo cms_uri_url('cms/surveyView/index')?>" class="tab tab-index active">Painel</a>
        <a href="<?php echo cms_uri_url('cms/surveyView/sheet')?>" class="tab tab-sheet">Relatório</a>
        <a href="<?php echo cms_uri_url('cms/surveyView/graph')?>" class="tab tab-graph">Comparações</a>

    </div><!-- fil -->

    <div class="fil date-range-filter">

        <div class="fil-inner clearfix">
            <div class="fil-col">
                <label for="dt1">de</label>
                <input type="text" name="dt1" id="dt1" value="00/00/0000">
            </div>
            <div class="fil-col">
                <label for="dt2">até</label>
                <input type="text" name="dt2" id="dt2" value="00/00/0000">
            </div>
        </div>

    </div><!-- fil -->

    <div class="fil text-right">

        <a href="#" class="btn btn-print">
            Exportar <br> <span>XLS</span>
        </a>

    </div><!-- fil -->


</div><!-- fil-row -->