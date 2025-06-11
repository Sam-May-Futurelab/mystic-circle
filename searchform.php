<form role="search" method="get" class="search-form mystical-search" action="<?php echo home_url('/'); ?>">
    <div style="position: relative; max-width: 100%;">
        <input type="search" 
               class="search-field" 
               placeholder="Search the cosmic wisdom..." 
               value="<?php echo get_search_query(); ?>" 
               name="s" 
               style="width: 100%; padding: 15px 50px 15px 20px; border: 2px solid rgba(212, 175, 55, 0.3); border-radius: 50px; background: rgba(45, 27, 61, 0.5); color: var(--star-white); font-family: var(--font-serif); font-size: 1rem;" />
        <button type="submit" 
                class="search-submit" 
                style="position: absolute; right: 5px; top: 50%; transform: translateY(-50%); background: var(--golden-gradient); color: var(--deep-purple); border: none; border-radius: 50%; width: 40px; height: 40px; cursor: pointer; transition: all 0.3s ease;">
            <span style="font-size: 1.2rem;">🔍</span>
        </button>
    </div>
</form>

<style>
.mystical-search input::placeholder {
    color: rgba(248, 246, 255, 0.6);
}

.mystical-search input:focus {
    outline: none;
    border-color: var(--rose-gold);
    box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1);
}

.mystical-search .search-submit:hover {
    transform: translateY(-50%) scale(1.1);
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}
</style>
