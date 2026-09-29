<div style="display:grid;gap:0.9rem;font-size:0.95rem;line-height:1.6;">
    <p style="margin:0;"><strong>{{ $record->name }}</strong> — {{ $record->email }}</p>
    <p style="margin:0;white-space:pre-wrap;">{{ $record->message }}</p>
    <p style="margin:0;color:#64748b;font-size:0.8rem;">Reçu le {{ $record->created_at?->format('d/m/Y H:i') }}</p>
</div>
