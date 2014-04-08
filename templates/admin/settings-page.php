<?
if(!empty($_POST['emediate_options'])){
    ERWP_Options::save(stripslashes_deep($_POST['emediate_options']));
    echo "<h1>Saved:".date("H:i:s")."</h1>";
}
?>

<div class="wrap">

    <div id="icon-options-general" class="icon32"><br/></div>
    <h2>Emediate Responsive Wordpress Plugin</h2>

    <form method="post" action="" >
        <? $emediate_opts = ERWP_Options::load(); ?>
        <div id="icon-options-general" class="icon32"><br/></div>
        <h2>Breakpoints</h2>
        <div id="emediate_breakpoints">
            <table class="widefat">

                <?php
                if(isset($emediate_opts['breakpoints'])){
                    $i = 0;
                    foreach ($emediate_opts['breakpoints'] as $opts) {
                        ?>
                        <tr>
                            <td>
                                <strong>Min-width: </strong><input type="text" name="emediate_options[breakpoints][<?php echo $i ?>][min_width]" value="<?php echo $opts['min_width']?>" />
                            </td>
                            <td>
                                <strong>Max-width: </strong><input type="text" name="emediate_options[breakpoints][<?php echo $i ?>][max_width]" value="<?php echo $opts['max_width']?>" />
                            </td>
                            <td>
                                <input type="button" class="button-secondary" value="Ta Bort" onclick="EmediateAdmin.remove(jQuery(this).parent().parent())"/>
                            </td>
                            <br/>
                        </tr>
                        <?
                        $i++;
                    }

                }
                ?>
            </table>
        </div>
        <input type="button" class="button-secondary" value="Lägg till ny" onclick="EmediateAdmin.addBreakpoint()" style="margin-top: 12px; margin-bottom: 5px"/>
        <input type="submit" class="button-primary" value="Spara" style="margin-top: 12px; margin-bottom: 5px">
        <div id="icon-options-general" class="icon32"><br/></div>
        <h2>Ads</h2>
        <div id="emediate_ads">
            <table class="widefat">
                <?php
                if(isset($emediate_opts['ads'])){
                    $i = 0;
                    foreach ($emediate_opts['ads'] as $opts) {
                        ?>
                        <tr>
                            <td>
                                <strong>Slug: </strong><input type="text" name="emediate_options[ads][<?php echo $i ?>][slug]" value="<?php echo $opts['slug']?>" />
                            </td>
                            <?
                                $cus= 0;
                                while(count($emediate_opts['breakpoints']) > $cus){ ?>
                                    <td>
                                        <strong>CU-<?php echo$cus?> </strong><input type="text" name="emediate_options[ads][<?php echo $i ?>][cu<?php echo $cus ?>]" value="<?php echo isset($opts['cu'.$cus]) ? $opts['cu'.$cus] : ''?>" />
                                    </td>

                               <?   $cus++;
                                }
                            ?>
                            <td>
                                <strong>Implementation: </strong>
                                <select type="text" name="emediate_options[ads][<?php echo $i ?>][implementation]" ?>">
                                    <option <? if($opts['implementation'] == 'fif') echo 'selected = selected'; ?> value="fif">
                                        FIF
                                    </option>
                                    <option <? if($opts['implementation'] == 'js') echo 'selected = selected'; ?> value="js">
                                        JS
                                    </option>
                                </select>
                            </td>
                            <td>
                                <strong>Status: </strong>
                                <select type="text" name="emediate_options[ads][<?php echo $i ?>][status]" ">
                                    <option <? if( empty($opts['status']) || $opts['status'] != 'inactive' ) echo 'selected = selected'; ?> value="active">
                                        Active
                                    </option>
                                    <option <? if( !empty($opts['status']) && $opts['status'] == 'inactive' ) echo 'selected = selected'; ?> value="inactive">
                                        Inactive
                                    </option>
                                </select>
                            </td>
                            <td>
                                <strong>Action: </strong>
                                <select type="text" name="emediate_options[ads][<?php echo $i ?>][action]"">
                                    <option <? if( !empty($opts['action']) ) echo 'selected = selected'; ?> value="yes">
                                        Yes
                                    </option>
                                    <option <? if( empty($opts['action']) ) echo 'selected = selected'; ?> value="">
                                        No
                                    </option>
                                </select>
                            </td>
                            <td>
                                <strong>Height: </strong><input type="text" name="emediate_options[ads][<?php echo $i ?>][height]" value="<?php echo empty($opts['height']) ? 0:$opts['height'] ?>" />
                            </td>
                            <td>
                                <input type="button" class="button-secondary" value="Ta Bort" onclick="EmediateAdmin.remove(jQuery(this).parent().parent())"/>
                            </td>
                            <br/>
                        </tr>
                        <?
                        $i++;
                    }
                }
                    ?>
            </table>
        </div>

        <input type="button" class="button-secondary" value="Lägg till ny" onclick="EmediateAdmin.addAd()" style="margin-top: 12px; margin-bottom: 5px"/>
        <input type="submit" class="button-primary" value="Spara" style="margin-top: 12px; margin-bottom: 5px">
        <div id="icon-options-general" class="icon32"><br/></div>
        <h2>General</h2>
        <table>
            <tr>
               <td>
                   <strong>Default_js_host: </strong>
               </td>
               <td>
                   <input type="text" name="emediate_options[default_js_host]" value="<?php echo $emediate_opts['default_js_host']?>" />
               </td>
            </tr>
            <tr>
                <td>
                    <strong>Cu_param_name: </strong>
                </td>
                <td>
                    <input type="text" name="emediate_options[cu_param_name]" value="<?php echo $emediate_opts['cu_param_name']?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Empty_ad_tags: </strong>
                </td>
                <td>
                    <textarea type="text" name="emediate_options[empty_ad_tags]" ><?php echo $emediate_opts['empty_ad_tags']?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Ad_query: </strong>
                </td>
                <td>
                    <textarea type="text" name="emediate_options[ad_query]" ><?php echo $emediate_opts['ad_query']?></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" class="button-primary" value="Spara" style="margin-top: 12px; margin-bottom: 5px">
                </td>
                <td></td>
            </tr>

        </table>

    </form>
</div>
