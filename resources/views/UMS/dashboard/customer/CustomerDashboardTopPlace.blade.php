<div class="content2">
    <h1>Top place</h1>
    <div class="places">

        @foreach ($foodOptions->take(6) as $foodOption)
            <div class="place">
                @php
                    $imageUrl = $foodOption->image
                        ? (Str::startsWith($foodOption->image, ['http://', 'https://'])
                            ? $foodOption->image
                            : asset('storage/' . $foodOption->image))
                        : asset('path/to/placeholder-image.jpg');
                @endphp
                <div class="img">
                    <img src="{{ $imageUrl }}" alt="" srcset="">
                </div>
                <div class="placeName">
                    <div class="name">{{ $foodOption->place_name }}</div>
                    <div class="rating">
                        @php
                            // @dd($foodOption->reviewAndRating)
                            $reviews = [];

                            foreach ($foodOption->reviewAndRating as $review) {
                                $reviews[] = $review->rate;
                            }

                            $totalReviews = count($reviews);

                            // Ensure there are reviews before calculating the average
                            if ($totalReviews > 0) {
                                $averageRating = array_sum($reviews) / $totalReviews;
                            } else {
                                $averageRating = 0; // default value when there are no reviews
                            }
                        @endphp

                        {{ round($averageRating, 1) }}/5
                    </div>
                </div>
            </div>

        @endforeach
     
    </div>
</div>