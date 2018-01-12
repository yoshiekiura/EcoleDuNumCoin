
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
}
function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}
$('.btnCopy').click(function(){
    copyToClipboard(this);
});
var moneyInfo = {
    BTC: {
        price: 0
    },
    ETH: {
        price: 0
    }
};
$.get( "https://api.coinmarketcap.com/v1/ticker/bitcoin/", function( data ) {
    moneyInfo.BTC.price = data[0].price_usd
});
$.get( "https://api.coinmarketcap.com/v1/ticker/ethereum/", function( data ) {
    moneyInfo.ETH.price = data[0].price_usd
});

$('#formBuy input[name="amount"]').change(function(){
    var price = $(this).val() * moneyInfo.BTC.price;
    $('.textInfo-Bbtc').text('Acheter '+$(this).val()+' BTC pour '+format2(price, '$')+' $');
});

$('#formSell input[name="amount"]').change(function(){
    var price = moneyInfo.BTC.price * $(this).val();
    $('.textInfo-Sbtc').text('Vendre '+$(this).val()+' BTC pour '+format2(price, '$')+' $');
});