@extends('admin.layouts.app')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">Media Manager</h1>
        <p class="page-subtitle">Upload and manage media files</p>
    </div>
    <div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            <i class="fas fa-upload me-2"></i> Upload Files
        </button>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.media.index') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search media..." value="{{ request('search') }}">
            </div>
            <div class="col-md-2">
                <label class="form-label">Collection</label>
                <select name="collection" class="form-select">
                    <option value="">All Collections</option>
                    @foreach($collections as $collection)
                        <option value="{{ $collection }}" {{ request('collection') == $collection ? 'selected' : '' }}>{{ ucfirst($collection) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Type</label>
                <select name="type" class="form-select">
                    <option value="">All Types</option>
                    <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Images</option>
                    <option value="video" {{ request('type') == 'video' ? 'selected' : '' }}>Videos</option>
                    <option value="document" {{ request('type') == 'document' ? 'selected' : '' }}>Documents</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary me-2">
                    <i class="fas fa-search me-2"></i> Filter
                </button>
                <a href="{{ route('admin.media.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i> Clear
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload Media Files</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Select Files *</label>
                        <input type="file" name="files[]" class="form-control" multiple accept="image/*,video/*,.pdf,.doc,.docx" required>
                        <small class="text-muted">You can select multiple files</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Collection *</label>
                            <select name="collection" class="form-select" required>
                                <option value="">Select Collection</option>
                                <option value="gallery">Gallery</option>
                                <option value="thumbnail">Thumbnail</option>
                                <option value="video">Video</option>
                                <option value="document">Document</option>
                                <option value="360">360 View</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alt Text</label>
                            <input type="text" name="alt_text" class="form-control" placeholder="Describe the image for accessibility">
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-upload me-2"></i> Upload Files
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Media Grid -->
<div class="card">
    <div class="card-body">
        @if($media->isNotEmpty())
            <div class="row g-4" id="mediaGrid">
                @foreach($media as $item)
                <div class="col-md-3" data-media-id="{{ $item->id }}">
                    <div class="card media-item">
                        <div class="card-body p-2">
                            <div class="media-preview">
                                @if(str_contains($item->mime_type, 'image'))
                                    <img src="{{ $item->url }}" alt="{{ $item->alt_text }}" class="img-fluid rounded" style="height: 150px; object-fit: cover;">
                                @else
                                    <div class="file-placeholder d-flex align-items-center justify-content-center" style="height: 150px;">
                                        <i class="fas fa-{{ str_contains($item->mime_type, 'video') ? 'video' : 'file' }} fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="media-info mt-2">
                                <h6 class="mb-1">{{ $item->filename }}</h6>
                                <small class="text-muted d-block">{{ $item->size_formatted }}</small>
                                <small class="text-muted d-block">{{ $item->collection }}</small>
                                <div class="media-actions mt-2">
                                    <button class="btn btn-sm btn-outline-primary edit-media" data-media-id="{{ $item->id }}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger delete-media" data-media-id="{{ $item->id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary copy-url" data-url="{{ $item->url }}">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            @if($media->hasPages())
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-muted">
                        Showing {{ $media->firstItem() }} to {{ $media->lastItem() }} of {{ $media->total() }} results
                    </div>
                    {{ $media->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-5">
                <i class="fas fa-photo-video fa-3x text-muted mb-3"></i>
                <div class="text-muted">No media files found</div>
                <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#uploadModal">
                    <i class="fas fa-upload me-2"></i> Upload First Files
                </button>
            </div>
        @endif
    </div>
</div>

<style>
.media-item {
    transition: transform 0.2s;
}

.media-item:hover {
    transform: translateY(-2px);
}

.media-preview {
    background: #f8f9fa;
    border-radius: 0.375rem;
    overflow: hidden;
}

.file-placeholder {
    background: #e9ecef;
    border-radius: 0.375rem;
}

.media-actions {
    display: flex;
    gap: 0.25rem;
}

.media-actions .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
}

.sortable-handle {
    cursor: move;
}
</style>

@section('scripts')
<script>
    // Upload form handling
    document.getElementById('uploadForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Uploading...';
        
        fetch('{{ route('admin.media.upload') }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('uploadModal'));
                modal.hide();
                
                // Show success message
                const alertHtml = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                `;
                
                // Add alert to page
                const alertDiv = document.createElement('div');
                alertDiv.innerHTML = alertHtml;
                document.querySelector('.card-body').prepend(alertDiv);
                
                // Auto-hide after 5 seconds
                setTimeout(() => {
                    const alert = document.querySelector('.alert');
                    if (alert) {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
                
                // Reload page after 2 seconds
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } else {
                alert('Error uploading files. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error uploading files. Please try again.');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });

    // Delete media
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-media')) {
            if (confirm('Are you sure you want to delete this media file?')) {
                const mediaId = e.target.dataset.mediaId;
                
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route('admin.media.destroy', ':id') }}`.replace(':id', mediaId);
                
                const csrfToken = document.createElement('input');
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                document.body.appendChild(form);
                form.submit();
            }
        }
    });

    // Copy URL to clipboard
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('copy-url')) {
            const url = e.target.dataset.url;
            
            navigator.clipboard.writeText(url).then(() => {
                const originalText = e.target.innerHTML;
                e.target.innerHTML = '<i class="fas fa-check"></i>';
                
                setTimeout(() => {
                    e.target.innerHTML = originalText;
                }, 2000);
            });
        }
    });

    // Edit media (placeholder for future implementation)
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-media')) {
            const mediaId = e.target.dataset.mediaId;
            // TODO: Implement edit functionality
            alert('Edit functionality coming soon!');
        }
    });
</script>
@endsection
