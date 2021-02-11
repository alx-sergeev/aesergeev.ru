<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
        <footer class="w3l-footer">
            <div id="footers14-block" class="py-3">
                <div class="container">
                    <div class="footers14-bottom text-center">
                        <div class="copyright mt-1">
                            <p>
                                <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . '/include/footer_text.php', [], ['NAME' => 'Текст в футере', 'MODE' => 'php']);?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <button onclick="topFunction()" id="movetop" title="Go to top">
                <span class="fa fa-angle-up" aria-hidden="true"></span>
            </button>
        </footer>
    </body>
</html>