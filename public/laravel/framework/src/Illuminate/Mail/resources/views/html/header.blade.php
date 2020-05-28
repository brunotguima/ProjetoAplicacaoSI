<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://cdn.discordapp.com/attachments/690684869549752433/711736812523094136/logo_color.png" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
