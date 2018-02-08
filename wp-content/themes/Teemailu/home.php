<?php get_header(); ?>
    <!-- Main article length: 500-1800 characters, 3ads -->
    <!-- Normal article length: 3000 characters, 3ads -->
    <!-- Column length: 1800 characters, 2ads -->
    <!-- Links to old columns: 1800 characters, no ads-->
  <section class="container">
    <section class="main">
      <div class="col-md-9 side">
        <article class="main-article">
        <?php
        // Main article

        $query = new WP_Query( array(    'post_type' => 'main_article',
                                         'posts-per-page' => 1 ));

        $main_article = $query->posts;

            $query->the_post();
             ?>
     <?php
                 the_content();
                 wp_reset_postdata();
     ?>
        </article>
        <hr>

        <article class="flowing_articles">
            <?php
                // 5 newest articles/columns opened

                    $query = new WP_Query( array('post_type' => array('article', 'column', 'picture_article')));

                    $post_ids = array();
                    $iterator = 5;

                    while($query->have_posts() && $iterator > 0)
                    {
                    $query->the_post();
                    ?>
                    <?php
                        echo    '<article class="article">';
                        the_content();
                        array_push($post_ids, $query->post->ID);
                        echo    '</article>';
                        echo '<hr>';
                    $iterator--;
                    }
                    wp_reset_postdata();

            ?>
        </article>

        <!--Added bootstrap image grid on 14 December-->
       <section class="coloumn">
         <h1>Previous post</h1>
            <?php
            // Older articles without texts

            for($i = 1; $i <= 7; $i++)
            {
                    echo 'News from '.$i.' days ago <br>';
                    $query = new WP_Query( array(        'post_type' => array('article', 'column', 'picture_article'),
                    'date_query' => array(
                            'after' => $i.' days ago'
                        ),
                    'post__not_in' => $post_ids,

                    ));
                    while($query->have_posts())
                    {
                    $query->the_post();
                    array_push($post_ids, $query->post->ID);
                    ?>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    }
                    wp_reset_postdata();
                }
                echo '</article>';
            ?>
      </div>
      <aside>

      <div class="col-md-3" id="myScrollspy">
        <nav class="nav" data-spy="affix" data-offset-top="240">
        <div class="google">
          <h3>Google Analytics</h3>
          <p>Some charts here</p>
        </div>
        <hr>
        <div class="daily_funnie">
          <h3>Daily Funnie</h3>
          <p>Statement replaced with some light fun to readers.
            Statement replaced with some light fun to readers.
            Statement replaced with some light fun to readers.
            Statement replaced with some light fun to readers.
            Statement replaced with some light fun to readers.
            Statement replaced with some light fun to readers.
          Statement replaced with some light fun to readers.Statement replaced with some light fun to readers.Statement replaced with some light fun to readers.</p>
        </div>
        <hr>
        <div class="links">
          <h3>Links</h3>
          <a href="#"><h5>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h5></a>
          <a href="#"><h5>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h5></a>
          <a href="#"><h5>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h5></a>
        </div>
        <hr>
        <div class="video-links">
          <h3>Video Links</h3>
          <a href="#"><h5>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h5></a>
          <a href="#"><h5>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h5></a>
          <a href="#"><h5>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</h5></a>
        </div>
        <hr>
      </nav><!--affix-->
      </div><!-- .col-md-3 side-->
    </aside>
    </section><!-- .main -->



    <?php get_footer(); ?>

    </body>
    </html>
