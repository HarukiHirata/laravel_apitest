@if(isset($items))
<a href="/">検索画面へ戻る</a>
<table border="1">
    <tr>
        <th>商品名</th>
        <th>価格</th>
    </tr>
    @foreach ($items as $item)
        <tr>
            <td>{{ $item['itemName'] }}</td>
            <td>{{ $item['itemPrice'] }}</td>
        </tr>
    @endforeach
</table>
@else
<a href="/">検索画面へ戻る</a>
<p>検索結果が見つかりませんでした。</p>
@endif
