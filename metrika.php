<?php
namespace Grav\Plugin;

use Grav\Common\Page\Collection;
use Grav\Common\Plugin;
use Grav\Common\Uri;
use Grav\Common\Taxonomy;

class MetrikaPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onAssetsInitialized' => ['onAssetsInitialized', 0]
        ];
    }

    /**
     * Add Yandex Metrika tracker
     */
    public function onAssetsInitialized()
    {
        if ($this->isAdmin()) {
            return;
        }
        $id       = trim($this->config->get('plugins.metrika.id'));
        $webVisor = trim($this->config->get('plugins.metrika.webvisor')) ? 'true': 'false' ;
        $hash     = trim($this->config->get('plugins.metrika.hash')) ? 'true' : 'false';
        if ($id) {
            $init = "
              (function (d, w, c) {
                  (w[c] = w[c] || []).push(function() {
                      try {
                          w.yaCounter{$id} = new Ya.Metrika({
                              id:{$id},
                              clickmap:true,
                              trackLinks:true,
                              accurateTrackBounce:true,
                              webvisor:{$webVisor},
                              trackHash:{$hash}
                          });
                      } catch(e) { }
                  });

                  var n = d.getElementsByTagName(\"script\")[0],
                      s = d.createElement(\"script\"),
                      f = function () { n.parentNode.insertBefore(s, n); };
                  s.type = \"text/javascript\";
                  s.async = true;
                  s.src = \"https://mc.yandex.ru/metrika/watch.js\";

                  if (w.opera == \"[object Opera]\") {
                      d.addEventListener(\"DOMContentLoaded\", f, false);
                  } else { f(); }
              })(document, window, \"yandex_metrika_callbacks\");
            ";
            $this->grav['assets']->addInlineJs($init);
        }
    }
}
