export type User = {
    id: number;
    name: string;
    email: string;
    email_verified_at?: any;
    created_at?: any;
    updated_at?: any;
    posts?: Post[];
    latest_post?: Post;
    latest_published_post?: Post;
};
export type Post = {
    id: string;
    title: string;
    content?: string;
    tags?: any;
    metadata?: any;
    status: PostStatus;
    user_id: number;
    created_at?: any;
    updated_at?: any;
    user?: User;
};
export enum PostStatus {
    Draft = "draft",
    Published = "published",
    Unpublished = "unpublished"
}
