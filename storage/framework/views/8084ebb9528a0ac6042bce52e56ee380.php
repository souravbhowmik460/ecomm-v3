<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Mayuri</title>
  <link rel="shortcut icon" href=<?php echo e(asset('/public/backend/assetss/images/favicon/favicon-32x32.png')); ?>>
  <style type="text/css">
    @media print {
      thead {
        display: table-header-group;
      }

      tfoot {
        display: table-footer-group;
      }

      tr {
        page-break-inside: avoid;
      }

      @page {
        size: A4;
      }

      .page-break {
        display: block;
        page-break-after: always;
      }
    }

    tr,
    td,
    tbody,
    table {
      vertical-align: middle;
    }
  </style>
</head>

<?php
  $shippingAddress = json_decode($order->shipping_address);
  $billingAddress = json_decode($order->billing_address);
  $otherCharges = json_decode($order->other_charges, true);
?>

<body style="margin:0; padding:0; align-items: center">

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td style="margin: 0; padding: 0" align="center">
          <table border="0" cellpadding="0" cellspacing="0" style="width:595px; padding:0; margin: 0 auto;">
            <tbody>
              <tr>
                <td style="margin: 0; padding:0; width: 595px;">
                  <table border="0" cellpadding="0" cellspacing="0"
                    style="width: 100%; margin:0; padding:40px 0; margin:0; background-color: #F3F4F6;">
                    <tbody>
                      <tr>
                        <td align="left" style="margin:0; padding:0; width: 345px;">
                          
                        </td>
                        <td align="left" style="margin:0; padding:0; width: 250px; vertical-align: center;">
                          <p
                            style="margin:0; padding: 0; font-family: Tahoma, Geneva, sans-serif; font-size: 40px; color: #000; font-weight: 400;">
                            Invoice</p>
                        </td>
                      </tr>

                      <tr>
                        <td align="left" style="margin:0; padding:15px 0 0 30px; width: 345px;">
                          <p
                            style="margin:0; padding: 0; font-family: Arial, sans-serif; font-size: 14px; color: #333; font-weight: 700;">
                            Billing To
                          </p>
                          <?php if(!empty($billingAddress->name)): ?>
                            <p
                              style="margin:10px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555;">
                              <span style="display: inline-block;"> <?php echo e($billingAddress->name); ?></span>
                            </p>
                          <?php endif; ?>
                          <?php if(!empty($billingAddress->phone)): ?>
                            <p
                              style="margin:5px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555;">
                              <span style="display: inline-block;"> <?php echo e($billingAddress->phone); ?></span>
                            </p>
                          <?php endif; ?>
                          <?php if(!empty($billingAddress->address)): ?>
                            <p
                              style="margin:5px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555;">
                              <span style="display: inline-block;"> <?php echo e($billingAddress->address); ?></span>
                            </p>
                          <?php endif; ?>
                        </td>
                        <td align="left" style="margin:0; width: 250px; padding: 15px 20px 0 0;">
                          <p
                            style="margin:0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555; font-weight: 600;">
                            Invoice No: #<?php echo e($order->order_number); ?>

                          </p>
                          <p
                            style="margin:5px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555;">
                            Invoice Date: <strong><?php echo e(date('d F Y', strtotime($order->created_at))); ?></strong>
                          </p>
                          <p
                            style="margin:5px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555;">
                            Status: <strong><?php echo e($order->order_status_text); ?></strong>
                          </p>
                          <?php if(!empty($order->payment_method_display)): ?>
                            <p
                              style="margin:5px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555;">
                              Payment Method: <strong><?php echo e($order->payment_method_display ?? ''); ?></strong>
                            </p>
                          <?php endif; ?>
                          <?php if(!empty($order->transaction_id)): ?>
                            <p
                              style="margin:5px 0 0; padding: 0; font-family: Arial, sans-serif; font-size: 12px; color: #555; white-space: nowrap;">
                              <span style="width: 83px; display:inline-block;">Transaction Id</span>
                              <span style="display: inline-block;">:
                                <strong><?php echo e($order->transaction_id ?? ''); ?></strong></span>
                            </p>
                          <?php endif; ?>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </td>
              </tr>

              <tr>
                <td style="margin: 0; padding:0; width: 595px;">
                  <table border="0" cellpadding="0" cellspacing="0"
                    style="width: 100%; margin:0; padding:20px 30px; margin:0; background-color: #fff;">
                    <tbody>
                      <tr>
                        <td style="margin: 0; padding:0; width: 100%;">
                          <table border="0" cellpadding="0" cellspacing="0"
                            style="width: 100%; margin:0; padding:0;">
                            <tbody>
                              <tr>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6;">
                                  Image</th>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6; width:92px;">
                                  Item</th>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6; width:132px;">
                                  Product Type</th>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6;">
                                  Price</th>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6;">
                                  Qty</th>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6;">
                                  Tax</th>
                                <th align="left"
                                  style="margin:0; padding: 10px 6px; border-right: 1px transparent; font-family: Tahoma, Geneva, sans-serif; font-size: 9px; font-weight:400; background-color: #F3F4F6;">
                                  Total</th>
                              </tr>
                              <?php $__currentLoopData = $order->orderProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productVariant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                  $defaultImage = $productVariant->variant->images[0]->gallery->file_name ?? null;
                                  $totalPrice =
                                      $productVariant->sell_price * $productVariant->quantity +
                                      $productVariant->tax_amount;
                                ?>
                                <tr>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; border-left: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <img
                                      src="<?php echo e($defaultImage ? asset('public/storage/uploads/media/products/images/' . $defaultImage) : asset('public/backend/assetss/images/products/product_thumb.jpg')); ?>"
                                      style="width: 50px;">
                                  </td>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <?php echo e($productVariant->variant->name ?? ''); ?></td>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <?php echo e($productVariant->variant->sku ?? ''); ?></td>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; font-family: DejaVu Sans, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <?php echo e(displayPrice($productVariant->sell_price)); ?></td>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <?php echo e($productVariant->quantity); ?></td>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; font-family: DejaVu Sans, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <?php echo e(displayPrice($productVariant->tax_amount)); ?></td>
                                  <td align="left"
                                    style="margin:0; padding: 15px 6px; border-right: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7; font-family: DejaVu Sans, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    <?php echo e(displayPrice($totalPrice)); ?></td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              <tr>
                                <td rowspan="<?php echo e($order->coupon_id != null ? 3 : 2); ?>"colspan="3" align="left"
                                  style="margin:0; padding: 15px 6px 5px; background-color: #F6F7FB; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 12px; font-weight:700; border-left: 1px solid #E7E7E7;">
                                  Order Summary</td>
                                <td colspan="3" align="left"
                                  style="margin:0; padding: 15px 6px 5px; background-color: #F6F7FB; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                  Item Total</td>
                                <td align="right"
                                  style="margin:0; padding: 15px 6px 5px; background-color: #F6F7FB; font-family: DejaVu Sans, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400; border-right: 1px solid #E7E7E7;">
                                  : <?php echo e(displayPrice($order->order_total)); ?></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left"
                                  style="margin:0; padding: 5px 6px; background-color: #F6F7FB; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                  Tax Amount</td>
                                <td align="right"
                                  style="margin:0; padding: 5px 6px; background-color: #F6F7FB; font-family: DejaVu Sans, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400; border-right: 1px solid #E7E7E7;">
                                  : <?php echo e(displayPrice($order->total_tax)); ?></td>
                              </tr>
                              <?php if($order->coupon_id != null): ?>
                                <tr>
                                  <td colspan="3" align="left"
                                    style="margin:0; padding: 5px 6px; background-color: #F6F7FB; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400;">
                                    Coupon Discount</td>
                                  <td align="right"
                                    style="margin:0; padding: 5px 6px; background-color: #F6F7FB; font-family: DejaVu Sans, Geneva, sans-serif; line-height:1.6; font-size: 9px; font-weight:400; border-right: 1px solid #E7E7E7;">
                                    : -<?php echo e(displayPrice($order->coupon_discount)); ?></td>
                                </tr>
                              <?php endif; ?>
                              <?php if(!empty($otherCharges) && count($otherCharges) > 0): ?>
                                <?php $__currentLoopData = $otherCharges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($value > 0): ?>
                                    <tr>
                                      <td colspan="3"
                                        style="margin:0; padding:8px 6px; background-color: #f6f7fb;">
                                      </td>
                                      <td colspan="3" align="left"
                                        style="margin:0; padding: 8px 6px; font-family: Tahoma, Geneva, sans-serif; background-color: #f6f7fb; line-height:1.6; font-size: 10px; font-weight:400;">
                                        <?php echo e(ucwords(str_replace('_', ' ', $key))); ?></td>
                                      <td align="right"
                                        style="margin:0; padding: 8px 6px; font-family: DejaVu Sans, Geneva, sans-serif; background-color: #f6f7fb; line-height:1.6; font-size: 10px; font-weight:400; border-right: 1px solid #E7E7E7;">
                                        : <?php echo e(displayPrice($value ?? 0)); ?>

                                      </td>
                                    </tr>
                                  <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                              <tr>
                                <td colspan="3" style="margin:0; padding:8px 6px; background-color: #D5ECFF;">
                                </td>
                                <td colspan="3" align="left"
                                  style="margin:0; padding: 8px 6px; font-family: Tahoma, Geneva, sans-serif; background-color: #D5ECFF; line-height:1.6; font-size: 10px; font-weight:400;">
                                  Grand Total</td>
                                <td align="right"
                                  style="margin:0; padding: 8px 6px; font-family: DejaVu Sans, Geneva, sans-serif; background-color: #D5ECFF; line-height:1.6; font-size: 10px; font-weight:400; border-right: 1px solid #E7E7E7;">
                                  <strong><?php echo e(displayPrice($order->net_total)); ?></strong>
                                </td>
                              </tr>

                              <tr>
                                <td colspan="3" align="left"
                                  style="margin:0; padding: 35px 6px; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; border-left: 1px solid #E7E7E7; border-bottom: 1px solid #E7E7E7;">
                                  <p style="margin: 0 0 8px; padding: 0; font-weight: 700; font-size: 12px;">Billing
                                    Details</p>
                                  <p style="margin: 0; padding: 0; font-size: 9px;">
                                    <?php echo e($billingAddress->name); ?><br>
                                    <?php echo e($billingAddress->phone); ?><br>
                                    <?php echo e($billingAddress->address); ?>

                                  </p>
                                </td>
                                <td colspan="4" align="left"
                                  style="margin:0; padding: 35px 6px; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; border-right: 1px solid #E7E7E7;  border-bottom: 1px solid #E7E7E7;">
                                  <p style="margin: 0 0 8px; padding: 0; font-weight: 700; font-size: 12px;">Shipping
                                    Details</p>
                                  <p style="margin: 0; padding: 0; font-size: 9px;">
                                    <?php echo e($shippingAddress->name); ?><br>
                                    <?php echo e($shippingAddress->phone); ?><br>
                                    <?php echo e($shippingAddress->address); ?>

                                  </p>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" align="left"
                                  style="margin:0; padding: 20px 6px; font-family: Tahoma, Geneva, sans-serif; line-height:1.6;">
                                  <p style="margin: 0; padding: 0; font-size: 9px;">
                                    Please feel free to reach out to us directly at
                                  </p>
                                </td>
                                <td colspan="4" align="left"
                                  style="margin:0; padding: 20px 6px; font-family: Tahoma, Geneva, sans-serif; line-height:1.6; width: 224px;">
                                  <p
                                    style="margin: 0; padding: 5px 0 5px 22px; font-size: 9px; color: #005AE0; float: left; background-image: url('<?php echo e(asset('public/backend/assetss/images/invoice/email.png')); ?>'); background-position: left center; background-repeat: no-repeat; margin-right: 10px;">
                                    Write to us anytime</p>
                                  <p
                                    style="margin: 0; padding: 5px 0 5px 22px; font-size: 9px; color: #005AE0; float: right; background-image: url('<?php echo e(asset('public/backend/assetss/images/invoice/whatsapp.png')); ?>'); background-position: left center; background-repeat: no-repeat;">
                                    Speak with us today</p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>
<?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/backend/pages/order-manage/orders/invoice-order.blade.php ENDPATH**/ ?>