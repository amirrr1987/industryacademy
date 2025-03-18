<?php
/**
 * Downloads
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/downloads.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$downloads = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<?php if ( $has_downloads ) : ?>

    <div class="accordion">
        <?php 
        $grouped_downloads = [];
        foreach ( $downloads as $download ) {
            $product_id = $download['product_id'];
            $grouped_downloads[$product_id][] = $download;
        }

        foreach ( $grouped_downloads as $product_id => $downloads ) : 
            $product = wc_get_product( $product_id );
            $product_name = $product->get_name();
        ?>
            <div class="accordion-item">
                <h2 class="accordion-header" onclick="toggleAccordion(<?php echo esc_attr($product_id); ?>)">
                    <span class="accordion-button">
                        <a href="<?php echo esc_url($product->get_permalink()); ?>" target="_blank" onclick="event.stopPropagation();">
                            <?php echo esc_html($product_name); ?>
                        </a>
                        <i class="fal fa-arrow-down"></i>
                    </span>
                </h2>
                <div class="accordion-content" id="content-<?php echo esc_attr($product_id); ?>" style="display: none;">
                    <div class="table-responsive">
                        <table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php esc_html_e('Download Name', 'studiare'); ?></th>
                                    <th><?php esc_html_e('Remaining Downloads', 'studiare'); ?></th>
                                    <th><?php esc_html_e('Expires On', 'studiare'); ?></th>
                                    <th><?php esc_html_e('Action', 'studiare'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ( $downloads as $index => $download ) : 
                                    $download_url = $download['download_url'];
                                    $download_name = $download['download_name'];
                                    $download_remaining = isset($download['downloads_remaining']) && $download['downloads_remaining'] !== '' ? $download['downloads_remaining'] : '∞';
                                    $download_expires = isset($download['access_expires']) && !empty($download['access_expires']) ? date_i18n(get_option('date_format'), strtotime($download['access_expires'])) : __('Never', 'woocommerce');
                                ?>
                                <tr>
                                    <td><?php echo esc_html($index + 1); ?></td>
                                    <td><?php echo esc_html($download_name); ?></td>
                                    <td><?php echo esc_html($download_remaining); ?></td>
                                    <td><?php echo esc_html($download_expires); ?></td>
                                    <td class="dl_holder_mydls"><a href="<?php echo esc_url($download_url); ?>"><i class="fal fa-cloud-download-alt"></i>&nbsp;<?php esc_html_e('Download', 'woocommerce'); ?></a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php else : ?>

    <?php
    $wp_button_class = wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '';
    wc_print_notice( esc_html__( 'No downloads available yet.', 'woocommerce' ) . ' <a class="button wc-forward' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' );
    ?>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>

<script>
function toggleAccordion(productId) {
    const content = document.getElementById('content-' + productId);
    if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "block";
    } else {
        content.style.display = "none";
    }
}
</script>

<style>
.accordion-item {
    border: 1px solid #ccc;
    margin-bottom: 15px;
    border-radius: 10px;
    padding: 10px;
}

.accordion-header {
    padding: 10px;
}

.accordion-button {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: none;
    border: none;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
}

.accordion-button a {
    color: inherit;
    text-decoration: none;
}


.accordion-content {
    padding: 10px;
    display: none;
}

.dl_holder_mydls a {
    color: #006CE3;
    width: 100%;
    background: #006ce333;
    border-radius: 5px;
    text-align: center;
    line-height: 2.4;
    padding: 6px 10px;
    text-indent: 0;
    display: block;
}
.shop_table{
    margin-bottom: 0;
}
.shop_table thead tr th:last-child {
    width: 10%;
}
table.shop_table tr td {
    border-bottom: none;
}
</style>
