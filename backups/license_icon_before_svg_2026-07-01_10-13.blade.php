@props(['type'])

@if($type == 'AM')
🚲
@elseif($type == 'A, A1')
🏍️
@elseif($type == 'B, B1')
🚗
@elseif($type == 'C')
🚚
@elseif($type == 'C1')
🚛
@elseif($type == 'D')
🚌
@elseif($type == 'D1')
🚐
@elseif($type == 'T, S')
🚜
@elseif($type == 'TRAM')
🚋
@elseif($type == 'MIL')
🛡️
@endif
