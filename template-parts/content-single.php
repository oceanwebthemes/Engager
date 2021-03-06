<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flatter
 */

?>

<div class="blog-single">
  <ul class="list-inline post-info">
    <li><a href=" <?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('d'))); ?>" title=""><?php the_time( get_option( 'date_format' ) ); ?></a></li>
        <li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID')));?>" title=""><?php echo esc_attr(get_the_author_meta('display_name'));?></a></li>
       <?php
              if(has_category()):
                    $cats = get_the_category();
                    foreach ( $cats as $cat ){
                        $cat_array[] = '<li><a href="'.esc_url( get_category_link( $cat->term_id ) ).'">'.esc_attr($cat->cat_name).'</a></li>';
                    }
                    echo esc_html(join( ', ', $cat_array ));
                    endif;
        ?>
        <?php if(has_tag()):
                  $tags = get_the_tags();
                 
                  foreach ( $tags as $cat ){
                               $tag_array[] = '<li><a href="'.esc_url( get_tag_link( $cat->term_id ) ).'">'.$cat->name.'</a></li>';
                          }
                         echo esc_html(join( '', $tag_array ));
              endif;
                ?>
  </ul>

  <?php if(has_post_thumbnail()):
    $args = array('class' => 'img-responsive center-block',);
        the_post_thumbnail('engager-post-image',$args); 
     endif;?>

  <div class="blog-content">
    <?php the_content();?>
  </div>

  <div class="comment-form">            
        <?php
  
      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;
    ?>
      
    </div>
</div>
