<?php 
add_filter('pre_option_link_manager_enabled','__return_true');

//使WordPress支持post thumbnail
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

/**
 * WordPress [分类目录]小工具显示没文章的分类
 * https://www.wpdaxue.com/widget-show-empty-categories.html
 */
add_filter( 'widget_categories_args', 'wpdx_show_empty_cats' );
function wpdx_show_empty_cats($cat_args) {
    $cat_args['hide_empty'] = 0;
    return $cat_args;
}


function get_breadcrumbs()
{
global $wp_query;
if ( !is_home() ){
// Start the UL
echo '<ul class="breadcrumb" style="background-color: transparent; margin: 0 5px;">';
echo '<li>所在位置</li>';
// Add the Home link
echo '<li><a href="'. get_settings('home') .'">网站首页</a></li>';
if ( is_category() )
{
$catTitle = single_cat_title( "", false );
//$cat = get_cat_ID( $catTitle );
//echo "<li> ". get_category_parents( $cat, TRUE, " " ) ."</li>";
echo '<li>';
the_category(' </li><li> ');
}
elseif ( is_archive() && !is_category() )
{
echo "<li>Archives</li>";
}
elseif ( is_search() ) {
echo "<li>Search Results</li>";
}
elseif ( is_404() )
{
echo "<li>404 Not Found</li>";
}
elseif ( is_single() )
{
//$category = get_the_category();
//$category_id = get_cat_ID( $category[0]->cat_name );
//echo '<li>'. get_category_parents( $category_id, TRUE, "/" );
//echo the_title('','', FALSE) ."</li>";
echo "<li>正文</li>";
}
elseif ( is_page() )
{
$post = $wp_query->get_queried_object();
if ( $post->post_parent == 0 ){
//echo "<li>".the_title('','', FALSE)."</li>";
    echo "<li>正文</li>";
} else {
$title = the_title('','', FALSE);
$ancestors = array_reverse( get_post_ancestors( $post->ID ) );
array_push($ancestors, $post->ID);
foreach ( $ancestors as $ancestor ){
if( $ancestor != end($ancestors) ){
echo '<li><a href="'. get_permalink($ancestor) .'">'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</a></li>';
} else {
echo '<li>'. strip_tags( apply_filters( 'single_post_title', get_the_title( $ancestor ) ) ) .'</li>';
}
}
}
}
// End the UL
echo "</ul>";
}
}
//面包屑功能
function the_breadcrumb() {
                echo '<ul class="breadcrumb" style="background-color: transparent; margin: 0 5px;">';
        if (!is_home()) {
                echo '<li><a href="';
                echo get_option('home');
                echo '">';
                echo '首页';
                echo "</a></li>";
                if (is_category() || is_single()) {
                        echo '<li>';
                        the_category(' </li><li> ');
                        if (is_single()) {
                                echo '</li><li>文章';
                                //the_title();
                                echo '</li>';
                        }
                } elseif (is_page()) {
                        echo '<li>';
                        echo the_title();
                        echo '</li>';
                }
        }
        elseif (is_tag()) {single_tag_title();}
        elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
        elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
        elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
        elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
        elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
        elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
        echo '</ul>';
}

/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码        
*/
function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
    if( $max_page >1 ) {
        echo '<ul class="pagination">'; 
        if( !$paged ){
            $paged = 1;
        }
        if( $paged != 1 ) {
            echo "<li><a href='".get_pagenum_link(1) ."' title='跳转到首页'>首页</a></li>";
        }
        echo '<li>';
        previous_posts_link('上一页');
        echo '</li>';
        if ( $max_page >$range ) {
            if( $paged <$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<li";
                    if($i==$paged) echo " class='active'";
                    echo "><a href='".get_pagenum_link($i) ."'";
                echo ">$i</a></li>";
                }
            }elseif($paged >= ($max_page -ceil(($range/2)))){
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<li";
                    if($i==$paged) echo " class='active'";
                    echo "><a href='".get_pagenum_link($i) ."'";
                echo ">$i</a></li>";
                    }
                }elseif($paged >= $range &&$paged <($max_page -ceil(($range/2)))){
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<li";if($i==$paged) echo " class='active'"; echo "><a href='".get_pagenum_link($i) ."'";echo ">$i</a></li>";
                    }
                }
            }else{
                for($i = 1;$i <= $max_page;$i++){
                    echo "<li";if($i==$paged) echo " class='active'"; echo "><a href='".get_pagenum_link($i) ."'";
                    echo ">$i</a></li>";
                }
            }
        echo '<li>';
        next_posts_link('下一页');
        echo '</li>';
        if($paged != $max_page){
            echo "<li><a href='".get_pagenum_link($max_page) ."' class='extend' title='跳转到最后一页'>尾页</a></li>";
        }
        // echo '<span>共['.$max_page.']页</span>';
        echo "</ul>\n";  
    }
}
// 获得标题
function customTitle($limit) {
    $title = get_the_title($post->ID);
    if(strlen($title) > $limit) {
        $title = substr($title, 0, $limit) . '...';
    }
    echo $title;
}

//获取子分类列表函数。  该函数有弊端，获取的列表包括父类别
function getchild($id)  
{  
$result = explode('/',get_category_children($id));  
$childs = array();  
foreach($result as $i)  
{  
if(!empty($i))$childs[] = get_category($i);  
}  
return $childs;  
}  


//函数cate_is_in_descendant_category( $cats )
//参数$cats一个分类ID，多个分类用ID数组
function cate_is_in_descendant_category( $cats ) {
    foreach ( (array) $cats as $cat ) {
        // get_term_children() accepts integer ID only
        $descendants = get_term_children( (int) $cat, "category" );
        if ( $descendants && is_category( $descendants ) )
            return true;
        }
        return false;
    }
