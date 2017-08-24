<div class="post height_100 ">
    <table class="height_100" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <td>
                <div class="search">
                    <form action="<?php echo url_for('shop_search') ?>" method="get">
                        <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>"
                               id="search_keywords"/>
                        <input type="submit" value="search"/>
                        <img id="loader" src="/legacy/images/loader.gif" style="vertical-align: middle; display: none"/>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</div>

