<x-layout>
        <div class="header">
        <div class="header-content">
            <h1>Product Details</h1>
            <a href="{{route('dashboard.admin')}}" class="back-btn">⬅️ Back to Products</a>
        </div>
    </div>

    <div class="container">
        <!-- Success Message (show conditionally) -->
        <!-- <div class="success-message">Review posted successfully!</div> -->

        <div class="product-card">
            <!-- Product Information -->
            <div class="product-header">
                <h1 class="product-title">{{$product->name}}</h1>
                <div class="product-price">${{$product->price}}</div>

                <div class="product-meta">
                    <div class="meta-item">
                        <span class="meta-label">Added since:</span>
                        <span class="meta-value">{{$product->created_at->format('M j, Y')}}</span>
                        {{-- <span class="meta-value">December 20th 2021</span> --}}
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Product ID:</span>
                        <span class="meta-value"># {{$product->id}}</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Total sold:</span>
                        <span class="meta-value">100</span>
                    </div>
                    <div class="meta-item">
                        <span class="meta-label">Number of available stocks:</span>
                        <span class="meta-value">{{$product->inventory}}</span>
                    </div>
                </div>
            </div>

            <!-- Product Description -->
            <div class="product-description">
                <h2 class="description-title">Description</h2>
                <p class="description-text">
                    Legit, comfortable VBB t-shirt available in any size.
                </p>
            </div>

            <!-- Reviews Section -->
            <div class="reviews-section">
                <div class="reviews-header">
                    <h2 class="reviews-title">Customer Reviews</h2>
                    <p class="reviews-subtitle">Share your experience with this product</p>
                </div>

                <!-- Leave a Review Form -->
                <div class="leave-review">
                    <h3>Leave a Review</h3>
                    <form class="review-form" action="{{route('review.store', $product)}}" method="POST">
                        @csrf
                        <textarea
                            class="review-textarea"
                            name="content"
                            placeholder="Write your review here..."
                            required></textarea>
                        <button type="submit" class="review-submit">Post</button>
                    </form>
                </div>

                <!-- Existing Reviews -->
                @foreach ($product->reviews as $review)

                <div class="reviews-list">
                    <!-- Review 1 -->
                    <div class="review-item">
                        <div class="review-header">
                            <span class="reviewer-name">{{$review->user->first_name}}: </span>
                            <span class="review-time">{{$review->created_at->diffForHumans()}}</span>
                        </div>
                        <div class="review-content">
                            {{$review->content}}
                        </div>

                        {{-- <!-- Comments on this review -->
                        <div class="comments-section">
                            <div class="comment-item">
                                <div class="comment-header">
                                    <span class="commenter-name">Karen Marie Igcasan wrote:</span>
                                    <span class="comment-time">23 minutes ago</span>
                                </div>
                                <div class="comment-content">Thank you for buying!</div>
                            </div>
                        </div>

                        <!-- Add Comment Form -->
                        <div class="add-comment">
                            <form class="comment-form" action="#" method="POST">
                                <textarea
                                    class="comment-input"
                                    name="content"
                                    placeholder="Write a comment..."
                                    required></textarea>
                                <button type="submit" class="comment-submit">Post</button>
                            </form>
                        </div> --}}
                    </div>


                </div>
                @endforeach
            </div>
        </div>
    </div>

    @push('style')
        <style>


            /* Header */
            .header {
                background: linear-gradient(135deg, #667eea, #764ba2);
                color: white;
                padding: 20px 0;
                margin-bottom: 30px;
                border-radius: 15px;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            }

            .header-content {
                max-width: 800px;
                margin: 0 auto;
                padding: 0 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .header h1 {
                font-size: 28px;
                font-weight: 700;
            }

            .back-btn {
                padding: 10px 20px;
                background: rgba(255, 255, 255, 0.2);
                color: white;
                text-decoration: none;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 500;
                border: 1px solid rgba(255, 255, 255, 0.3);
                transition: all 0.3s ease;
            }

            .back-btn:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-2px);
            }

            /* Product Card */
            .product-card {
                background: white;
                border-radius: 15px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
                overflow: hidden;
                margin-bottom: 30px;
                transition: box-shadow 0.3s ease;
            }

            .product-card:hover {
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            }

            .product-header {
                padding: 30px;
                border-bottom: 1px solid #e9ecef;
            }

            .product-title {
                font-size: 32px;
                font-weight: 700;
                color: #333;
                margin-bottom: 15px;
            }

            .product-price {
                font-size: 24px;
                font-weight: 600;
                color: #28a745;
                margin-bottom: 20px;
            }

            .product-meta {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                font-size: 14px;
                color: #666;
            }

            .meta-item {
                display: flex;
                flex-direction: column;
            }

            .meta-label {
                font-weight: 600;
                color: #495057;
                margin-bottom: 5px;
            }

            .meta-value {
                color: #666;
            }

            .product-description {
                padding: 30px;
                border-bottom: 1px solid #e9ecef;
            }

            .description-title {
                font-size: 18px;
                font-weight: 600;
                color: #333;
                margin-bottom: 15px;
            }

            .description-text {
                color: #666;
                line-height: 1.7;
            }

            /* Reviews Section */
            .reviews-section {
                padding: 30px;
            }

            .reviews-header {
                margin-bottom: 25px;
            }

            .reviews-title {
                font-size: 20px;
                font-weight: 600;
                color: #333;
                margin-bottom: 10px;
            }

            .reviews-subtitle {
                color: #666;
                font-size: 14px;
            }

            /* Leave Review Form */
            .leave-review {
                background: #f8f9fa;
                border-radius: 12px;
                padding: 25px;
                margin-bottom: 30px;
                border: 1px solid #e9ecef;
            }

            .leave-review h3 {
                font-size: 16px;
                font-weight: 600;
                color: #333;
                margin-bottom: 15px;
                font-style: italic;
            }

            .review-form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .review-textarea {
                width: 100%;
                padding: 15px;
                border: 2px solid #e1e5e9;
                border-radius: 8px;
                font-size: 14px;
                font-family: inherit;
                resize: vertical;
                min-height: 100px;
                transition: all 0.3s ease;
                background: white;
            }

            .review-textarea:focus {
                outline: none;
                border-color: #667eea;
                box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            }

            .review-textarea::placeholder {
                color: #999;
            }

            .review-submit {
                align-self: flex-end;
                padding: 12px 24px;
                background: linear-gradient(135deg, #667eea, #764ba2);
                color: white;
                border: none;
                border-radius: 8px;
                font-size: 14px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            }

            .review-submit:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(102, 126, 234, 0.5);
            }

            /* Review Item */
            .review-item {
                border: 2px solid #e9ecef;
                border-radius: 12px;
                padding: 20px;
                margin-bottom: 20px;
                background: white;
                transition: all 0.3s ease;
            }

            .review-item:hover {
                border-color: #667eea;
                box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
            }

            .review-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 12px;
            }

            .reviewer-name {
                font-weight: 600;
                color: #333;
                font-size: 14px;
            }

            .review-time {
                color: #999;
                font-size: 12px;
                font-style: italic;
            }

            .review-content {
                color: #666;
                line-height: 1.6;
                font-size: 14px;
                background: #f8f9fa;
                padding: 15px;
                border-radius: 8px;
                border-left: 4px solid #667eea;
            }

            /* Comments */
            .comments-section {
                margin-top: 15px;
                margin-left: 20px;
            }

            .comment-item {
                background: #f1f3f4;
                border-radius: 8px;
                padding: 12px 15px;
                margin-bottom: 10px;
                border-left: 3px solid #28a745;
            }

            .comment-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 8px;
            }

            .commenter-name {
                font-weight: 500;
                color: #333;
                font-size: 13px;
            }

            .comment-time {
                color: #999;
                font-size: 11px;
                font-style: italic;
            }

            .comment-content {
                color: #555;
                font-size: 13px;
                line-height: 1.5;
            }

            /* Add Comment Form */
            .add-comment {
                margin-top: 15px;
                margin-left: 20px;
            }

            .comment-form {
                display: flex;
                gap: 10px;
                align-items: flex-start;
            }

            .comment-input {
                flex: 1;
                padding: 10px 12px;
                border: 1px solid #ddd;
                border-radius: 6px;
                font-size: 13px;
                font-family: inherit;
                resize: none;
                min-height: 40px;
            }

            .comment-input:focus {
                outline: none;
                border-color: #28a745;
                box-shadow: 0 0 0 2px rgba(40, 167, 69, 0.1);
            }

            .comment-submit {
                padding: 10px 16px;
                background: #28a745;
                color: white;
                border: none;
                border-radius: 6px;
                font-size: 12px;
                font-weight: 500;
                cursor: pointer;
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .comment-submit:hover {
                background: #218838;
                transform: translateY(-1px);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .container {
                    padding: 15px;
                }

                .header-content {
                    flex-direction: column;
                    gap: 15px;
                    text-align: center;
                }

                .product-meta {
                    grid-template-columns: 1fr;
                    gap: 15px;
                }

                .product-title {
                    font-size: 24px;
                }

                .product-price {
                    font-size: 20px;
                }

                .product-header,
                .product-description,
                .reviews-section,
                .leave-review {
                    padding: 20px;
                }

                .comments-section,
                .add-comment {
                    margin-left: 10px;
                }

                .comment-form {
                    flex-direction: column;
                    gap: 8px;
                }
            }

            /* Success message */
            .success-message {
                background: #d4edda;
                color: #155724;
                padding: 12px 15px;
                border-radius: 8px;
                margin-bottom: 20px;
                border-left: 4px solid #28a745;
                font-size: 14px;
            }
        </style>
    @endpush

    {{-- <script>
        // Auto-resize textareas
        document.querySelectorAll('textarea').forEach(textarea => {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        });

        // Form submissions (for demo - remove preventDefault in Laravel)
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); // Remove this in Laravel

                const textarea = this.querySelector('textarea');
                if (textarea.value.trim()) {
                    alert('Comment/Review posted successfully!');
                    textarea.value = '';
                    textarea.style.height = 'auto';
                }
            });
        });

        // Add hover effects to review items
        document.querySelectorAll('.review-item').forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });

            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script> --}}
</x-layout>
