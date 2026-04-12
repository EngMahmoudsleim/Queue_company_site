<div class="modal fade" id="demoModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content demo-modal">
      <div class="modal-header border-0">
        <h5 class="modal-title">{{ __('messages.demo_credentials') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body pt-0">
        <div class="credential-row"><span>URL</span><code id="demo-url">-</code></div>
        <div class="credential-row"><span>Username</span><code id="demo-username">-</code></div>
        <div class="credential-row mb-3"><span>Password</span><code id="demo-password">-</code></div>
        <div class="d-flex gap-2 flex-wrap">
          <button class="btn btn-outline-primary btn-sm copy-trigger" data-target="demo-username">{{ __('messages.buttons.copy') }} Username</button>
          <button class="btn btn-outline-primary btn-sm copy-trigger" data-target="demo-password">{{ __('messages.buttons.copy') }} Password</button>
          <a id="open-demo-link" target="_blank" class="btn btn-primary btn-sm">{{ __('messages.buttons.open_demo') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
