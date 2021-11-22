<?php echo $header; ?>
<article class="recipe">
    <header class="recipe-header">
        <div class="recipe-header__cover" style="background-image: url('https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2070&q=80')"></div>
        <div class="recipe-header__main container-medium">
            <h1 class="recipe-header__title"><?php echo $recipe['title']; ?></h1>
            <div class="recipe-header__stars star-rating star-rating--lg">
                <?php for ($i = 0; $i < $avg_rating; $i++): ?>
                <i class="is-active fas fa-star"></i>
                <?php endfor; ?>
                <?php for ($i = 0; $i < 5 - $avg_rating; $i++): ?>
                <i class="fas fa-star"></i>
                <?php endfor; ?>
            </div>
            <a class="recipe-header__reviews" href="#reviews"><?php echo count($reviews); ?> reviews</a>
        </div>
    </header>
    <div class="container-medium">
        <div class="recipe__content">
            <h2>Ingredients</h2>
            <ul>
                <?php foreach ($ingredients as $ingredient): ?>
                <li><?php echo $ingredient['name']; ?></li>
                <?php endforeach; ?>
            </ul>
            <h2>How to cook</h2>
            <?php echo $recipe['description']; ?>
        </div>
        <section class="adding-review mt-xl">
            <h2 class="adding-review__heading">Add Review</h2>
            <div class="adding-review__main">
                <form class="form" action="" method="post" id="form-review">
                    <?php if (isset($form_error)): ?>
                    <div class="mb-m">
                        <p class="form-error"><?php echo $form_error; ?></p>
                    </div>
                    <?php endif; ?>
                    <div>
                        <label class="form-label" for="form-comment-review">Review</label>
                        <textarea class="form-textarea <?php echo isset($form_validation['review']) ? 'is-invalid' : ''; ?>" name="review" cols="30" rows="4" id="form-comment-review"><?php echo isset($_POST['review']) ? $_POST['review'] : ''; ?></textarea>
                        <?php if (isset($form_validation['review'])): ?>
                        <p class="input-error"><?php echo $form_validation['review']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mt-s">
                        <p class="form-label">Please, select rating:</p>
                        <div class="form-radio-row">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <div class="form-radio">
                                <input class="form-radio__control" type="radio" name="rating" value="<?php echo $i; ?>" id="form-comment-rating<?php echo $i; ?>" <?php echo isset($_POST['rating']) && $_POST['rating'] == $i ? 'checked' : ''; ?>>
                                <label class="form-radio__label" for="form-comment-rating<?php echo $i; ?>"><?php echo $i; ?></label>
                            </div>
                            <?php endfor; ?>
                        </div>
                        <?php if (isset($form_validation['rating'])): ?>
                        <p class="input-error"><?php echo $form_validation['rating']; ?></p>
                        <?php endif; ?>
                    </div>
                    <!-- <div class="mt-s">
                        <label class="form-label" for="form-comment-rating">Rating</label>
                        <select class="form-select w-100" name="reting" id="form-comment-rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mt-s">
                        <label class="form-label" for="form-comment-review">Input</label>
                        <input class="form-input" type="text" name="">
                    </div>
                    <div class="mt-s">
                        <div class="form-checkbox">
                            <input class="form-checkbox__control" type="checkbox" name="" id="form-comment-checkbox">
                            <label class="form-checkbox__label" for="form-comment-checkbox">Input</label>
                        </div>
                        <div class="form-checkbox mt-xxs">
                            <input class="form-checkbox__control" type="checkbox" name="" id="form-comment-checkbox1">
                            <label class="form-checkbox__label" for="form-comment-checkbox1">Input</label>
                        </div>
                    </div> -->
                    <!-- <div class="mt-s">
                        <label class="form-label" for="form-comment-review">File</label>
                        <input class="form-file" type="file">
                    </div> -->
                    <input type="hidden" name="recipe_id" id="form-recipe-id" value="<?php echo $recipe['recipe_id']; ?>">
                    <button class="btn btn--primary mt-s w-100" type="submit">Send</button>
                </form>
            </div>
        </section>
        <section class="reviews mt-xl" id="reviews">
            <h2 class="reviews__heading">Reviews</h2>
            <div class="reviews__main">
                <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                <article class="review-card">
                    <div class="review-card__avatar">
                        <img src="https://placeimg.com/64/64/people" alt="<?php echo $review['firstname'] . ' ' . $review['lastname']; ?>" width="64" height="64">
                    </div>
                    <div class="review-card__body">
                        <h3 class="review-card__heading"><?php echo $review['firstname'] . ' ' . $review['lastname']; ?></h3>
                        <p class="review-card__review"><?php echo $review['description']; ?></p>
                        <div class="review-card__stars star-rating">
                            <?php for ($i = 0; $i < $review['rating']; $i++): ?>
                            <i class="is-active fas fa-star"></i>
                            <?php endfor; ?>
                            <?php for ($i = 0; $i < 5 - $review['rating']; $i++): ?>
                            <i class="fas fa-star"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
                <?php else: ?>
                <p class="reviews__empty">No reviews.</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
</article>
<?php echo $footer; ?>