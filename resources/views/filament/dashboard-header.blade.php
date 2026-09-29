<div class="np-admin-hero">
    <div>
        <p class="np-admin-kicker">Portfolio Admin</p>
        <h2 class="np-admin-name">Narcisse OGOUDIKPE</h2>
        <p class="np-admin-lead">Projets publiés, messages du site et suivi des lectures.</p>
    </div>
    <div class="np-admin-chips">
        <span>{{ $publishedCount }} projet{{ $publishedCount > 1 ? 's' : '' }} publié{{ $publishedCount > 1 ? 's' : '' }}</span>
        <span>{{ $unreadCount }} non lu{{ $unreadCount > 1 ? 's' : '' }}</span>
    </div>
</div>

<style>
    .np-admin-hero {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 1.5rem;
        padding: 1.75rem 2rem;
        border-radius: 1.25rem;
        color: #f8fafc;
        background:
            radial-gradient(circle at top right, rgba(34, 211, 238, 0.28), transparent 42%),
            linear-gradient(135deg, #020617 0%, #0f172a 55%, #083344 100%);
        box-shadow: 0 20px 40px rgba(2, 6, 23, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.08);
    }

    .np-admin-kicker {
        margin: 0 0 0.35rem;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #67e8f9;
    }

    .np-admin-name {
        margin: 0;
        font-size: clamp(1.6rem, 2vw, 2.2rem);
        font-weight: 700;
        letter-spacing: -0.03em;
        color: #f8fafc;
    }

    .np-admin-lead {
        margin: 0.45rem 0 0;
        color: #cbd5e1;
        font-size: 0.95rem;
    }

    .np-admin-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        justify-content: flex-end;
    }

    .np-admin-chips span {
        padding: 0.45rem 0.8rem;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.08);
        font-size: 0.8rem;
        font-weight: 600;
        color: #e2e8f0;
    }

    @media (max-width: 768px) {
        .np-admin-hero {
            flex-direction: column;
            align-items: flex-start;
        }

        .np-admin-chips {
            justify-content: flex-start;
        }
    }
</style>
