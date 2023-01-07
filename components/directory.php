<?php declare(strict_types=1);

namespace WebGarden\Mounds;

$source = gpc_get_string('source', 'github');
$plugins = fetch_plugin_repositories($source);
?>
<div class="col-md-12 col-xs-12">
  <div class="widget-box widget-color-blue2">
    <div class="widget-header widget-header-small">
      <h4 class="widget-title lighter">
        <a id="directory"></a>
        <?php print_icon('fa-github', 'ace-icon') ?>
        <?= plugin_lang_get('plugin_directory') ?>
      </h4>
    </div>
    <div class="widget-body">
      <div class="widget-main no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-condensed table-hover">
            <colgroup>
              <col style="width:25%" />
              <col style="width:75%" />
            </colgroup>
            <thead>
            <tr>
              <th><?= plugin_lang_get('repository') ?></th>
              <th><?= lang_get('plugin_description') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($plugins as $plugin): ?>
              <tr>
                <td style="white-space: nowrap">
                  <?php print_plugin_repository_link($plugin->name, $plugin->url) ?>
                  <small>
                    <?php print_icon('fa-star', 'ace-icon', $plugin->stars) ?>
                    <?= $plugin->stars ?>
                  </small>
                </td>
                <td>
                  <?= $plugin->description ? "{$plugin->description}<br>" : '' ?>
                  <span class="small">License: <?= $plugin->license ?? 'N/A' ?></span>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
