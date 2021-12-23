all: update brain-progression

install:
	composer install

brain-games:
	@./bin/brain-games

brain-gcd:
	@./bin/brain-gcd

brain-even:
	@./bin/brain-even

brain-prim:
	@./bin/brain-prime

brain-calc:
	@./bin/brain-calc

brain-progression:
	@./bin/brain-progression

brain-prime:
	@./bin/brain-prime

validate:
	composer validate

lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin

update:
	composer update

chmod:
	chmod +x bin/brain-prime
