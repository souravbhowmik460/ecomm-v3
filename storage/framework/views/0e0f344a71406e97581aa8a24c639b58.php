<?php $__env->startSection('content'); ?>
  <tr>
    <td style="width:80px"></td>
    <td>
      <p>Hello <b><?php echo e($user->name); ?></b>,</p>
      <p>Thank you for your order! Your order number is <strong>#<?php echo e($order->order_number); ?></strong>.</p>
      <p>
        <b>Order Total:</b> <?php echo e(displayPrice($order->net_total)); ?>

      </p>
      <p>
        You can view your order details by clicking the button below:
      </p>
      <p>
        <a href="<?php echo e(route('order.details', ['order_number' => $order->order_number])); ?>"
          style="color: #fff; background-color: #222; padding: 10px 15px; text-decoration: none;">
          View Order
        </a>
      </p>
      <p>We will notify you once your order has been shipped.</p>
      <p>If you have any questions, feel free to contact our support team.</p>
    </td>
    <td style="width:80px"></td>
  </tr>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('emails.frontend.includes.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\wamp64\www\ecomm-v3\resources\views/emails/frontend/order-confirmation.blade.php ENDPATH**/ ?>