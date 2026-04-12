(function () {
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    const sendEvent = (payload) => {
        fetch('/track/event', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': token, 'Accept': 'application/json'},
            body: JSON.stringify(payload),
            keepalive: true,
        }).catch(() => {});
    };

    document.addEventListener('click', function (e) {
        const el = e.target.closest('[data-track-event]');
        if (!el) return;
        sendEvent({
            event_type: el.dataset.trackEvent,
            project_id: el.dataset.projectId || null,
            page_slug: el.dataset.pageSlug || null,
            label: el.dataset.label || null,
        });
    });
})();
