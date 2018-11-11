{extends 'tpl.msEmail'}

{block 'title'}
{'ms2_email_subject_new_manager' | lexicon : $order}
{/block}

{block 'products'}
{parent}
<div style="padding: 0 10px">
    <h2>Контактные данные</h2>
    <p>Имя:     <b>{$address.receiver}</b></p>
    <p>Телефон: <b>{$address.phone}</b></p>
    <p>e-mail:  <b>{$user.email}</b></p>
    <p>Комментарий: <b>{$address.comment}</b></p>

    <h2>Адрес доставки</h2>
    <p>Индекс:     <b>{$address.index}</b></p>
    <p>Регион: <b>{$address.region}</b></p>
    <p>Город:  <b>{$address.city}</b></p>
    <p>Улица: <b>{$address.street}</b></p>
    <p>Дом: <b>{$address.building}</b></p>
    <p>Корпус: <b>{$address.properties.extfld_corpus}</b></p>
    <p>Строение: <b>{$address.properties.extfld_stroenie}</b></p>
    <p>Квартира: <b>{$address.room}</b></p>

    <p>Оплата: <b>{$payment.name}</b></p>
    <p><b>{$order.comment}</b></p>
    <p><b>{$delivery.price}</b></p>
    {*if $payment_link?}
    <p style="margin-left:20px;{$style.p}">
        {'ms2_payment_link' | lexicon : ['link' => $payment_link]}
    </p>
    {/if*}
</div>
{/block}

